<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        
        $reviews = Review::published()
            ->when($type, function ($query, $type) {
                return $query->byType($type);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $featuredReviews = Review::published()
            ->featured()
            ->when($type, function ($query, $type) {
                return $query->byType($type);
            })
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('reviews.index', compact('reviews', 'featuredReviews', 'type'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        if ($review->status !== 'published') {
            abort(404);
        }

        // Buscar reviews relacionados do mesmo tipo
        $relatedReviews = Review::published()
            ->byType($review->type)
            ->where('id', '!=', $review->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('reviews.show', compact('review', 'relatedReviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:movie,book,series',
            'author_director' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 5),
            'genre' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:10',
            'summary' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'image_url' => 'nullable|url',
            'trailer_url' => 'nullable|url',
            'status' => 'required|in:draft,published',
            'is_featured' => 'boolean'
        ]);

        $review = Review::create($validated);

        return redirect()->route('reviews.show', $review)
            ->with('success', 'Review criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:movie,book,series',
            'author_director' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 5),
            'genre' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:10',
            'summary' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'image_url' => 'nullable|url',
            'trailer_url' => 'nullable|url',
            'status' => 'required|in:draft,published',
            'is_featured' => 'boolean'
        ]);

        $review->update($validated);

        return redirect()->route('reviews.show', $review)
            ->with('success', 'Review atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Review excluída com sucesso!');
    }

    /**
     * Display reviews by type.
     */
    public function byType($type)
    {
        if (!in_array($type, ['movie', 'book', 'series'])) {
            abort(404);
        }

        return $this->index(request()->merge(['type' => $type]));
    }
}
