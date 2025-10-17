<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(['category', 'tags', 'user'])
                   ->where('status', 'published')
                   ->findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
