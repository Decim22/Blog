<?php



Route::get('/', function () {
    return view('welcome');
});
Route::view('/','blog.index');
Route::get('' 'PostsController@index');
Route::view('admin','dashboard.index');
Route::view('login','dashboard.sign-in');

