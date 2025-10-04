<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'excerpt',
        'content',
        'featured_image',
        'category',
        'horror_level',
        'status',
        'user_id',
        'published_at'
    ];

    protected $casts = [
        'horror_level' => 'integer',
        'published_at' => 'datetime',
    ];

    /**
     * Relacionamento com o usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope para posts publicados
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    /**
     * Accessor para calcular tempo de leitura
     */
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200); // 200 palavras por minuto
        return $minutes . ' min';
    }
}
