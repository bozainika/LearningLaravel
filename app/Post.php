<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable=['title','content','slug','status','user_id'];
	protected $guarded=['id'];
	public function category(){
		return $this->belongsToMany('App\Category')->withTimestamps();
	}
	public function comments(){
		return $this->morphMany('App\Comment','post');
	}
	public function saveCategory($categories){
        if(!empty($categories)){
            $this->category()->sync($categories);
        }
        else{
            $this->category()->detach();
        }
    }
}
