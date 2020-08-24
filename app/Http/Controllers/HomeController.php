<?php

namespace App\Http\Controllers;

use App\User;
use App\Feedback;
use App\Announcement;
use Illuminate\Http\Request;
use App\Mail\ContactRecieved;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    public function newAnn()
    {
        return view('announcements.new');
    }

    public function storeAnn(Request $request){
        $user = Auth::user();
        $a = new Announcement();

        $a->title = $request->input('title');
        $a->description = $request->input('description');
        $a->category_id = $request->input('category');
        $a->user_id = $user->id;

        $a->save();

        return redirect('/')->with('ann.ok','ok');

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

        return redirect()->back();
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
}
