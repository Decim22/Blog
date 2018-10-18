<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
		protected $fillable = ['comment', 'post_id'];
		//protected $guarded = [];
    public function post() {
    	return $this->belongsTo(Post::class);
    }
}
