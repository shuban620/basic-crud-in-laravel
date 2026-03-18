@extends('layouts.app')

@section('content')
    <h2>Create Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <p>
            <label style="font-weight: bold;" for="title">Title</label><br>
            <input style="width: 100%; border: 1px solid #ccc;border-radius: 12px; padding: 8px;" id="title" type="text" name="title" value="{{ old('title') }}">
        </p>
        <p>
            <label style="font-weight: bold;" for="content">Content</label><br>
            <textarea style="width: 100%;border-radius: 12px; border: 1px solid #ccc; padding: 8px;" id="content" name="content" rows="6">{{ old('content') }}</textarea>
        </p>
        <button style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px;" type="submit">Save</button>
        <a href="{{ route('posts.index') }}" style="padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 5px;">Cancel</a>
    </form>
@endsection
