<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC') ->paginate(); // Por defecto 15
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post, $slug)
    {
        if ( $post->slug != $slug ){
            return redirect($post->url, 301);
        }
        return view('posts.show', compact('post'));
    }
}
