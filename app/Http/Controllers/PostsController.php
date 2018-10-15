<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
class PostsController extends Controller
{
    public function index(Request $request) {
    // $posts = Post::latest()->simplePaginate(3);
    $posts = Post::latest();
    if(isset($request['month'])) {
        $posts = $posts->whereMonth('created_at', Carbon::parse($request['month'])->month);
    }
    if(isset($request['year'])) {
        $posts = $posts->whereYear('created_at', $request['year']);
    }
    $posts = $posts->simplePaginate(3);
    $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
    ->groupBy('year', 'month')
    ->orderByRaw('year, month desc')
    ->get()
    ->toArray();
    // dd($archives);
		return view('blog.index',compact('posts', 'archives'));
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('blog.show', compact('post'));
    }
}
