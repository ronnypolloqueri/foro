@extends('layouts.app')
@section('content')
    <h1>{{ $post->title }}</h1>
    {{ $post->content}}</h1>
    {{ $post->user->name}}</h1>
@endsection
