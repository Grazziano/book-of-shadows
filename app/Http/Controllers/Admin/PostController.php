<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['category', 'user'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                    
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);
        
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        
        if ($request->status == 'published') {
            $post->published_at = now();
        }
        
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts', 'public');
            $post->featured_image = $path;
        }
        
        $post->save();
        
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }
        
        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(['category', 'tags', 'user'])->findOrFail($id);
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('tags')->findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);
        
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        
        // Atualiza o slug apenas se o título mudou
        if ($post->title != $request->title) {
            $post->slug = Str::slug($request->title);
        }
        
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->category_id = $request->category_id;
        
        // Atualiza a data de publicação se o status mudou para publicado
        if ($post->status != 'published' && $request->status == 'published') {
            $post->published_at = now();
        }
        
        if ($request->hasFile('featured_image')) {
            // Remove a imagem antiga se existir
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            
            $path = $request->file('featured_image')->store('posts', 'public');
            $post->featured_image = $path;
        }
        
        $post->save();
        
        // Sincroniza as tags
        $post->tags()->sync($request->tags ?? []);
        
        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        
        // Remove a imagem se existir
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }
        
        $post->delete();
        
        return redirect()->route('admin.posts.index')
                        ->with('success', 'Post excluído com sucesso!');
    }
}
