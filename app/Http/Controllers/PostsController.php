<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Category;
use App\Tag;
class PostsController extends Controller
{
    public function index(Request $request) {
    // $posts = Post::latest()->simplePaginate(3);

  //       $posts = Post::latest()->filter(request(['month', 'year']))->simplePaginate(3);
  //       $archives = Post::archives();
		// return view('blog.index')->with('posts', $posts);

        // Experiment
        $prefix = $request->route()->getPrefix();
        if ($prefix == '/admin') {
            $posts = Post::latest()->filter(request(['month', 'year']))->paginate(10);
            return view('dashboard.index')->with('posts', $posts);
        }
        else {
            $posts = Post::latest()->where('status', '2')->filter(request(['month', 'year']))->simplePaginate(3);
            $archives = Post::archives();
            return view('blog.index')->with('posts', $posts);
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('blog.show', compact('post'));
    }

    public function create() {
        $categories = Category::all();
        return view('dashboard.create')->with('categories' , $categories);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = new Post;
        $post->user_id = Auth()->user()->id;
        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->status = $request->input('status');
        $post->save();
        return redirect('/admin')->with('success', 'Post Created');

    }
    
}