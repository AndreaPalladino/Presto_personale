<?php

namespace App;

use App\Announcement;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function announcements(){
        return $this->hasMany(Announcement::class);
    }
}
