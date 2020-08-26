<?php

namespace App\Http\Controllers;

use App\User;
use App\Contact;
use App\Feedback;
use App\Announcement;
use App\Jobs\ResizeImage;
use App\Mail\AskRecieved;
use App\AnnouncementImage;
use Illuminate\Http\Request;
use App\Mail\ContactRecieved;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function newAnn(Request $request)
    {
        $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view('announcements.new', compact('uniqueSecret'));
    }

    public function storeAnn(Request $request){
        $user = Auth::user();
        $a = new Announcement();

        $a->title = $request->input('title');
        $a->description = $request->input('description');
        $a->category_id = $request->input('category');
        $a->user_id = $user->id;

        $a->save();

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);

        $images = array_diff($images, $removedImages);

        

        foreach ($images as $image) {
            $i = new AnnouncementImage();

            $fileName = basename($image);
            $newFileName = "public/announcement/{$a->id}/{$fileName}";
            Storage::move($image, $newFileName);

            
           /*  dispatch(new ResizeImage(
                $newFileName,
                300,
                150
            )); 

            dispatch(new ResizeImage(
                $newFileName,
                700,
                300
            ));  
 */
            
            
            

            $i->file = $newFileName;
            $i->announcement_id = $a->id;

            $i->save();
            
           /*  dispatch(new GoogleVisionSafeSearchImage($i->id));
            dispatch(new GoogleVisionLabelImage($i->id));  */
           GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 300, 150),
                new ResizeImage($i->file, 400, 300),
            ])->dispatch($i->id);    
                
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect('/')->with('ann.ok','ok');

    }

    public function uploadImage(Request $request){
        
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        )); 

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id'=>$fileName
            ]
           );

   }

   public function removeImage(Request $request){
       $uniqueSecret = $request->input('uniqueSecret');

       $fileName = $request->input('id');

       session()->push("removedimages.{$uniqueSecret}", $fileName);

       Storage::delete($fileName);

       return response()->json('ok');
   }

   public function getImages(Request $request){
    $uniqueSecret = $request->input('uniqueSecret');

    $images = session()->get("images.{$uniqueSecret}",[]);
    $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

    $images = array_diff($images, $removedImages);
    
    $data = [];

    foreach ($images as $image) {
        $data[] = [
            'id' => $image,
            'src' =>AnnouncementImage::getUrlByFilePath($image, 120, 120)
        ];
    }

    return response()->json($data);
}




    public function feedback(Request $request, $announcement_id){

        
        $user = Auth::user();
        $f = new Feedback();
        
        $f->body = $request->input('body');
        $f->user_id = $user->id;
        $f->announcement_id = $announcement_id;
        $f->email = $request->input('email');
        $f->name = $request->input('name');

        $f->save();

        return redirect()->back();

    }

    public function profile(){

        $user = Auth::user();
        $accettati = $user->announcements()->where('is_accepted',true)->simplePaginate(6);
        $sospesi = $user->announcements()->where('is_accepted', null)->simplePaginate(6);
        $rifiutati = $user->announcements()->where('is_accepted', false)->simplePaginate(6);


        return view('profile', compact('user', 'accettati', 'sospesi', 'rifiutati'));
    }

    public function reviseAgain($ann_id){
        $announcement = Announcement::find($ann_id);
        $announcement->is_accepted = null;
        $announcement->save();
        return redirect()->back();
    }

    public function viewProfile($user_id){
        $user = User::find($user_id);
        $accettati = $user->announcements()->where('is_accepted',true)->simplePaginate(6);
        $sospesi = $user->announcements()->where('is_accepted', null)->simplePaginate(6);
        $rifiutati = $user->announcements()->where('is_accepted', false)->simplePaginate(6);
        return view('profile', compact('user', 'accettati', 'sospesi', 'rifiutati'));
    }

    public function contactSeller( $ann_id){

        $announcement = Announcement::find($ann_id);
        $email = $announcement->user->email;
        $contact = Auth::user()->email;
        
        Mail::to($email)->send(new ContactRecieved($contact));

        return redirect()->back()->with('contact', 'ok');
    }

    public function askRevisor(){
       
        return view('contact');
    }

    public function contactSubmit(Request $request){
        
        $contact = new Contact();
        $name=$request->input('name');
        $email=$request->input('email');
        $request=$request->input('request');
        
        $contact = compact('name','email','request');

        

       
        Mail::to($email)->send(new AskRecieved($contact));

        return redirect()->back()->with('asked', 'ok');
    }

    public function edit(Announcement $announcement){
        
        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement){

        
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        
        $announcement->category_id = $request->input('category');
        $announcement->is_accepted = null;
    
        $announcement->update();

        return redirect(route('profile'));

    }

    public function delete(Announcement $announcement){

        
        $announcement->delete();

        return redirect(route('profile'))->with('deleted', 'ok');
    }

    public function acceptedDelete(Announcement $announcement){
        $announcement->delete();

        return redirect(route('profile'))->with('deleted', 'ok');
    }
}
