<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

// auth
Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthenticatedSessionController::class, 'index'])->name('login');
  Route::post('/login', [AuthenticatedSessionController::class, 'store']);
  Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
  Route::post('/register', [RegisteredUserController::class, 'store']);
});

// profile
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  Route::patch('/profile', [ProfileController::class, 'update']);
  Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
});

// posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::patch('/posts/{post}', [PostController::class, 'update'])->middleware('auth')->can('manage-post', 'post');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('auth')->can('manage-post', 'post');

// search posts
Route::post('/search', SearchController::class)->name('search');
