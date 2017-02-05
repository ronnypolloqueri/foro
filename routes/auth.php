<?php

// Posts
Route::get('posts', 'CreatePostController@create' )->name('posts.create');
Route::post('posts', 'CreatePostController@store' )->name('posts.store');

