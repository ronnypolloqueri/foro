<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Posts
Route::get('posts', 'PostsController@create' )->name('posts.create');
Route::post('posts', 'PostsController@store' )->name('posts.store');
Route::get('posts/{id}', 'PostsController@show' )->name('posts.show');

Auth::routes();

Route::get('/home', 'HomeController@index');
