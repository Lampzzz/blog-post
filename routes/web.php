<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

// auth
Route::get('/login', [AuthenticatedSessionController::class, 'index']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'index']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

// profile
Route::get('/profile', [AuthenticatedSessionController::class, 'show']);

// posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
