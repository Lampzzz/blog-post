<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

// auth
Route::get('/login', [AuthenticatedSessionController::class, 'index'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

// profile
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  Route::patch('/profile', [ProfileController::class, 'update']);
});

// posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::patch('/posts/{post}', [PostController::class, 'update'])->middleware('auth')->can('manage-post', 'post');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('auth')->can('manage-post', 'post');
