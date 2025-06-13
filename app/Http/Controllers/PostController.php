<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->simplePaginate(3);

        return view('home', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        Gate::authorize('manage-post', $post);

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request)
    {
        Gate::authorize('manage-post', $post);

        $post->update($request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]));

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        Gate::authorize('manage-post', $post);

        $post->delete();

        return redirect('/');
    }
}
