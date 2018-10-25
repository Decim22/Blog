<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	  public function posts() {
	  	return $this->belongsToMany(\App\Post::class);
	  }
	  public function getRouteKeyName() {
	  	return 'name';
	  }
}
