<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('/', 'welcome');
Route::view('/', 'blog/index');
// Route::view('/dashboard', 'dashboard/index');
Route::view('/sign_in', 'dashboard/signin');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');
