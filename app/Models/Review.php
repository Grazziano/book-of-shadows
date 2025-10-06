<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'summary',
        'type',
        'author_director',
        'genre',
        'release_year',
        'rating',
        'image_url',
        'trailer_url',
        'featured',
        'status'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'rating' => 'decimal:1',
        'release_year' => 'integer'
    ];

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Accessors
    public function getExcerptAttribute()
    {
        return $this->summary ?? \Illuminate\Support\Str::limit(strip_tags($this->content), 150);
    }

    public function getTypeDisplayAttribute()
    {
        return match($this->type) {
            'movie' => 'Filme',
            'book' => 'Livro',
            'series' => 'Série',
            default => $this->type
        };
    }
}
