<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Post;
use App\Tag;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('blog.partial.sidebar', function($view) {
            // $view->with('archives', Post::archives());
            $archives = Post::archives();
            $tags = Tag::pluck('name');
            // $categories = Category::pluck('name');
            $view->with(compact('archives', 'tags'));
        });

        view()->composer('blog.partial.nav', function($view) {
            $categories = Category::all();
            $view->with(compact('categories'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
