<?php

namespace App;

use App\User;
use App\Category;
use App\Feedback;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


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

    static public function TotalCount(){
        return Announcement::all()->count();
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
