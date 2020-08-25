<?php

namespace App;

use App\User;
use App\Category;
use App\Feedback;
use App\AnnouncementImage;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
{
    use Searchable;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function images(){
        return $this->hasMany(AnnouncementImage::class);
    }

    static public function TotalCount(){
        return Announcement::where('is_accepted',true)->count();
    }

    static public function ToBeRevisioned(){
        return Announcement::where('is_accepted',null)->count();
    }

    static public function RejectedCount(){
        return Announcement::where('is_accepted',false)->count();
    }

    public function toSearchableArray(){

        $category=$this->category()->pluck('name')->join(', ');
        $user=$this->user()->pluck('name')->join(', ');
        $array = [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'altro'=>'annunci',
            'category'=>$category,
            'user'=>$user
        ];
  
        return $array;
    }
}
