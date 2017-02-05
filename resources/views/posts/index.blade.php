@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
    <ul id="posts">
        @foreach($posts as $post)
        <li>
            <a href="{{ $post->url }}">
                {{ $post->title }}
            </a>
        </li>
        @endforeach
    </ul>

    {{ $posts->render() }}
@endsection
