@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.create') }}">+ New Post</a>
    <hr>

    @forelse ($posts as $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.show', $post) }}">View</a> |
        <a href="{{ route('posts.edit', $post) }}">Edit</a> |
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Delete this post?')">Delete</button>
        </form>
        <hr>
    @empty
        <p>No posts found.</p>
    @endforelse

    {{ $posts->links() }}
@endsection
