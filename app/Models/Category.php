<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image'
    ];
    
    /**
     * Get all posts for the category
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
