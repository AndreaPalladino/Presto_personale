<?php

namespace App;

use App\User;
use App\Announcement;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public function announcement(){
        return $this->belongsTo(Announcement::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
