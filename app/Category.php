<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable=['name'];
	protected $guarded=['id'];
	public function post(){
		return $this->belongsToMany('App\Post')->withTimestamps();
	}
}
