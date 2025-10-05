<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        'moral'
    ];

    protected $casts = [
        'danger_level' => 'integer',
    ];

    /**
     * Scope para lendas publicadas
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('created_at');
    }
}
