<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    static public function TotalCount(){
        return Announcement::all()->count();
    }
}
