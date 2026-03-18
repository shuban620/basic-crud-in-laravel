@extends('layouts.app')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.edit', $post) }}">Edit</a> |
    <a href="{{ route('posts.index') }}">Back</a>
@endsection
