<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post($request->all());

        auth()->user()->posts()->save($post);

        return redirect()->route('posts.show', $post->id);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
