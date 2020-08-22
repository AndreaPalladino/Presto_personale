<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage(){

        $announcements = Announcement::orderBy('created_at', 'desc')->take(6)->get();

        return view('welcome', compact('announcements'));
    }

    public function annByCategory($category_id){

        $category = Category::find($category_id);
        $announcements = $category->announcements()->orderBy('created_at', 'desc')->simplePaginate(10);

        return view('annByCat', compact('category', 'announcements'));
    }

    public function detail(Announcement $announcement){

        $user = User::find($announcement->user_id);
        $announcements = $user->announcements()->where('id','!=', $announcement->id)->orderBy('created_at','desc')->get();

        $feeds = $announcement->feedbacks()->get();

        return view('annDetail', compact('announcement','announcements', 'feeds'));
    }
}
