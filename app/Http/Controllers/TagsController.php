<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagsController extends Controller
{
    public function index(Tag $tag) {
    	$posts = $tag->posts()->simplePaginate(3);
    	return view('blog.index', compact('posts'));
    }
}
