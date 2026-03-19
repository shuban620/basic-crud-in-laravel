<?php

use App\Livewire\PostsCrud;
use Illuminate\Support\Facades\Route;

Route::get('/', PostsCrud::class)->name('posts.livewire');
Route::get('/posts', PostsCrud::class)->name('posts.index');
