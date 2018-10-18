<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\Post;
use App\Comment;
class CommentsController extends Controller
{
  	public function store(Post $post) {
  		// Comment::create([
  		// 	'comment' => request('comment'),
  		// 	'post_id' => $post->id
  		// ]);
  		$post->addComments(request('comment'));
  		// return back();
  		return Redirect::to(URL::previous()."#commentForm");
  	}
}
