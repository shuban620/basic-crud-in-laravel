@extends('layouts.app')

@section('content')
    <h2>Create Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <p>
            <label for="title">Title</label><br>
            <input id="title" type="text" name="title" value="{{ old('title') }}" style="width: 100%;">
        </p>
        <p>
            <label for="content">Content</label><br>
            <textarea id="content" name="content" rows="6" style="width: 100%;">{{ old('content') }}</textarea>
        </p>
        <button type="submit">Save</button>
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>
@endsection
