<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = ['name','content'];

     public function comments()
     {
     	return $this->hasMany('App\Comment');
     }

     public function getNumCommentsStr()
     {
     	$num  =  $this->comments()->count();
     	if ($num == 1) {
     		return "1 comment";
     	}
     	return $num . 'comment';
     
     }

}
