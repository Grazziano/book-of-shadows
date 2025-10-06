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
