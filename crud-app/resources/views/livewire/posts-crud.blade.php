<div>
    <h3 style="font-style: italic; background-color: #f0f0f0; padding: 10px;">{{ $isEditing ? 'Edit Post' : 'Create Post' }}</h3>

    <form wire:submit="{{ $isEditing ? 'update' : 'store' }}">
        <p>
            <label style="font-weight: bold;" for="title">Title</label><br>
            <input style="width: 100%; border: 1px solid #ccc; border-radius: 4px;" id="title" type="text" wire:model.defer="title">
            @error('title') <small style="color: red;">{{ $message }}</small> @enderror
        </p>
        <p>
            <label style="font-weight: bold;" for="content">Content</label><br>
            <textarea style="width: 100%; border: 1px solid #ccc; border-radius: 4px;" id="content" wire:model.defer="content" rows="5"></textarea>
            @error('content') <small style="color: red;">{{ $message }}</small> @enderror
        </p>
        <button style="background-color: green; border: 1px solid #ccc; cursor: pointer; border-radius: 4px; color: #fff; font-weight: bold; padding: 10px;" type="submit">{{ $isEditing ? 'Update' : 'Save' }}</button>
        @if ($isEditing)
            <button style="background-color: blue; border: 1px solid #ccc; cursor: pointer; border-radius: 4px; color: #fff; font-weight: bold; padding: 10px;" type="button" wire:click="cancelEdit">Cancel</button>
        @endif
    </form>

    <hr>
    <h3 style="font-style: italic; background-color: #f0f0f0; padding: 10px;">All Posts</h3>

    @forelse ($posts as $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <button style="background-color: yellow; border: 1px solid #ccc; cursor: pointer; border-radius: 4px; color: #333; font-weight: bold; padding: 10px;" type="button" wire:click="edit({{ $post->id }})">Edit</button>
        <button style="background-color: red; border: 1px solid #ccc; cursor: pointer; border-radius: 4px; color: #fff; font-weight: bold; padding: 10px;" type="button" wire:click="delete({{ $post->id }})" wire:confirm="Delete this post?">Delete</button>
        <hr>
    @empty
        <p>No posts found.</p>
    @endforelse

    {{ $posts->links() }}
</div>
