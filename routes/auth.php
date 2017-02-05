<?php

// Posts
Route::get('posts', 'PostsController@create' )->name('posts.create');
Route::post('posts', 'PostsController@store' )->name('posts.store');

