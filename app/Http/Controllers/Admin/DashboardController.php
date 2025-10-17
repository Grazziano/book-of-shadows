<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class DashboardController extends Controller
{
    /**
     * Mostra o dashboard administrativo
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = [
            'posts' => Post::count(),
            'posts_published' => Post::where('status', 'published')->count(),
            'categories' => Category::count(),
            'tags' => Tag::count(),
        ];

        $recent_posts = Post::with(['category', 'user'])
                            ->orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();

        return view('admin.dashboard', compact('stats', 'recent_posts'));
    }
}
