<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function userList(){

        $users = User::where('id','!=', Auth::user()->id)->get();

        return view('admin.userlist', compact('users'));
    }

    public function makeRevisor($user_id){
        $user = User::find($user_id);
        $user->is_revisor=true;
        $user->save();

        return redirect()->back();
    }

    public function unMakeRevisor($user_id){
        $user = User::find($user_id);
        $user->is_revisor=false;
        $user->save();

        return redirect()->back();
    }
}
