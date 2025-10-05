<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Legend extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'location',
        'category',
        'danger_level',
        'content',
        'moral',
        'excerpt',
        'featured_image',
        'status',
        'category_id',
        'user_id',
        'published_at'
    ];

    protected $casts = [
        'danger_level' => 'integer',
        'published_at' => 'datetime'
    ];

    /**
     * Get the category that owns the legend
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Get the user that owns the legend
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the tags for the legend
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Scope para lendas publicadas
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
