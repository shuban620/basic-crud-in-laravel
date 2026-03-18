@extends('layouts.app')

@section('content')
    <h2>Edit Post</h2>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label for="title">Title</label><br>
            <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" style="width: 100%;">
        </p>
        <p>
            <label for="content">Content</label><br>
            <textarea id="content" name="content" rows="6" style="width: 100%;">{{ old('content', $post->content) }}</textarea>
        </p>
        <button type="submit">Update</button>
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>
@endsection
