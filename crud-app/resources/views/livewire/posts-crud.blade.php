<div>
    <h2>{{ $isEditing ? 'Edit Post' : 'Create Post' }}</h2>

    <form wire:submit="{{ $isEditing ? 'update' : 'store' }}">
        <p>
            <label for="title">Title</label><br>
            <input id="title" type="text" wire:model.defer="title" style="width: 100%;">
            @error('title') <small style="color: red;">{{ $message }}</small> @enderror
        </p>
        <p>
            <label for="content">Content</label><br>
            <textarea id="content" wire:model.defer="content" rows="5" style="width: 100%;"></textarea>
            @error('content') <small style="color: red;">{{ $message }}</small> @enderror
        </p>
        <button type="submit">{{ $isEditing ? 'Update' : 'Save' }}</button>
        @if ($isEditing)
            <button type="button" wire:click="cancelEdit">Cancel</button>
        @endif
    </form>

    <hr>
    <h2>All Posts</h2>

    @forelse ($posts as $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <button type="button" wire:click="edit({{ $post->id }})">Edit</button>
        <button type="button" wire:click="delete({{ $post->id }})" wire:confirm="Delete this post?">Delete</button>
        <hr>
    @empty
        <p>No posts found.</p>
    @endforelse

    {{ $posts->links() }}
</div>
