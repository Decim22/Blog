<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
class PostsController extends Controller
{
    public function index(Request $request) {
    // $posts = Post::latest()->simplePaginate(3);

    $posts = Post::latest()->filter(request(['month', 'year']))->simplePaginate(3);

    $archives = Post::archives();
		return view('blog.index')->with('posts', $posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('blog.show', compact('post'));
    }

    public function create() {
        return view('dashboard.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = new Post;
        $post->user_id = Auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/admin')->with('success', 'Post Created');
    }
    
}