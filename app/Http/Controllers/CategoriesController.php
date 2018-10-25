<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoriesController extends Controller
{
    public function index(Category $category) {
    	$posts = $category->posts()->simplePaginate(3);
    	return view('blog.index', compact('posts'));
    }
}
