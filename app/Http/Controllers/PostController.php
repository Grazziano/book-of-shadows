<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

        $comments = Comment::with('user')
            ->where('target_type', 'posts')
            ->where('target_id', $post->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('posts.show', compact('post', 'comments'));
    }
}
