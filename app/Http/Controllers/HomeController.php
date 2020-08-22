<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
