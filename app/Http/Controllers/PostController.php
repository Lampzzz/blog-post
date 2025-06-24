<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $posts = Post::with('user')
                ->where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->orWhereJsonContains('tags', $query)
                ->latest()
                ->simplePaginate(5);
        } else {
            $posts = Post::with('user')->latest()->simplePaginate(5);
        }

        return view('home', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'required|string',
        ]);

        $tags = explode(', ', $request->input('tags'));

        $validated['user_id'] = Auth::id();

        Post::create([
            ...$validated,
            'tags' => $tags
        ]);

        return redirect('/posts');
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
