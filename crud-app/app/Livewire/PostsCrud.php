<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsCrud extends Component
{
    use WithPagination;

    public string $title = '';
    public string $content = '';
    public ?int $postId = null;
    public bool $isEditing = false;

    public function store(): void
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        Post::create($validated);
        $this->resetForm();
        session()->flash('success', 'Post created.');
        $this->resetPage();
    }

    public function edit(int $id): void
    {
        $post = Post::findOrFail($id);

        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->isEditing = true;
    }

    public function update(): void
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        Post::findOrFail($this->postId)->update($validated);
        $this->resetForm();
        session()->flash('success', 'Post updated.');
    }

    public function delete(int $id): void
    {
        Post::findOrFail($id)->delete();
        session()->flash('success', 'Post deleted.');
        $this->resetPage();
    }

    public function cancelEdit(): void
    {
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->reset(['title', 'content', 'postId', 'isEditing']);
    }

    public function render()
    {
        return view('livewire.posts-crud', [
            'posts' => Post::latest()->paginate(10),
        ])->layout('layouts.app');
    }
}
