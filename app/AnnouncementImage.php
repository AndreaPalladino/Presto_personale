<?php

namespace App;

use App\Announcement;
use Illuminate\Database\Eloquent\Model;

class AnnouncementImage extends Model
{
    public function announcement(){
        return $this->belongsTo(Announcement::class);
    }
}
