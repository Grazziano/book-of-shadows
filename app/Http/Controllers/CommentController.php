<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'target_type' => 'required|string|in:horror-stories,urban-legends,reviews,posts',
            'target_id' => 'required|integer|min:1',
            'content' => 'required|string|min:3|max:2000',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'target_type' => $validated['target_type'],
            'target_id' => $validated['target_id'],
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Comentário publicado!')->withFragment('comments');
    }
}
