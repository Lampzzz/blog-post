<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('postsSearch');

        return redirect()->route('posts.index', ['search' => $query]);
    }
}
