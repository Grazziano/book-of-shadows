@extends('layouts.app')

@section('title', $review->title)

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 via-purple-900 to-black text-white">
    <!-- Hero Section -->
    <div class="relative py-20 px-4">
        @if($review->image_url)
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $review->image_url }}');">
            <div class="absolute inset-0 bg-black opacity-70"></div>
        </div>
        @else
        <div class="absolute inset-0 bg-gradient-to-r from-purple-900 to-red-900 opacity-50"></div>
        @endif
        
        <div class="relative max-w-4xl mx-auto">
            <div class="flex items-center mb-6">
                <a href="{{ route('reviews.index') }}" 
                   class="inline-flex items-center text-purple-400 hover:text-purple-300 transition-colors mr-4">
                    ← Voltar às avaliações
                </a>
                <span class="px-4 py-2 text-sm font-semibold rounded-full 
                    {{ $review->type === 'movie' ? 'bg-red-600 text-white' : 
                       ($review->type === 'book' ? 'bg-green-600 text-white' : 'bg-blue-600 text-white') }}">
                    {{ $review->type_display }}
                </span>
            </div>
            
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-red-600">
                {{ $review->title }}
            </h1>
            
            <div class="flex flex-wrap items-center gap-6 text-lg">
                @if($review->author_director)
                <div class="flex items-center">
                    <span class="text-gray-400 mr-2">
                        {{ $review->type === 'book' ? '✍️ Autor:' : '🎬 Diretor:' }}
                    </span>
                    <span class="font-semibold">{{ $review->author_director }}</span>
                </div>
                @endif
                
                @if($review->release_year)
                <div class="flex items-center">
                    <span class="text-gray-400 mr-2">📅</span>
                    <span>{{ $review->release_year }}</span>
                </div>
                @endif
                
                @if($review->genre)
                <div class="flex items-center">
                    <span class="text-gray-400 mr-2">🎭</span>
                    <span>{{ $review->genre }}</span>
                </div>
                @endif
                
                @if($review->rating)
                <div class="flex items-center bg-yellow-600 px-4 py-2 rounded-full">
                    <span class="text-yellow-100 mr-2">⭐</span>
                    <span class="font-bold text-yellow-100">{{ $review->rating }}/10</span>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-4xl mx-auto px-4 pb-16">
        <!-- Summary -->
        @if($review->summary)
        <div class="bg-gray-800 rounded-lg p-8 mb-8 border-l-4 border-purple-600">
            <h2 class="text-2xl font-bold mb-4 text-purple-400">📝 Resumo</h2>
            <p class="text-lg leading-relaxed text-gray-300">{{ $review->summary }}</p>
        </div>
        @endif

        <!-- Main Content -->
        <div class="bg-gray-800 rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-bold mb-6 text-purple-400">💭 Nossa Avaliação</h2>
            <div class="prose prose-lg prose-invert max-w-none">
                {!! nl2br(e($review->content)) !!}
            </div>
        </div>

        <!-- Trailer/Additional Info -->
        @if($review->trailer_url)
        <div class="bg-gray-800 rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-bold mb-4 text-purple-400">🎥 Trailer</h2>
            <a href="{{ $review->trailer_url }}" 
               target="_blank" 
               class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                Assistir Trailer →
            </a>
        </div>
        @endif

        <!-- Meta Information -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8">
            <div class="flex flex-wrap items-center justify-between text-sm text-gray-400">
                <span>Publicado em {{ $review->created_at->format('d/m/Y') }}</span>
                @if($review->updated_at != $review->created_at)
                <span>Atualizado em {{ $review->updated_at->format('d/m/Y') }}</span>
                @endif
            </div>
        </div>

        <!-- Related Reviews -->
        @if($relatedReviews->count() > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Você também pode gostar</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($relatedReviews as $related)
                <div class="group bg-gray-800 rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                    @if($related->image_url)
                    <div class="aspect-w-16 aspect-h-9 bg-gray-700">
                        <img src="{{ $related->image_url }}" alt="{{ $related->title }}" class="w-full h-32 object-cover">
                    </div>
                    @endif
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $related->type === 'movie' ? 'bg-red-600 text-white' : 
                                   ($related->type === 'book' ? 'bg-green-600 text-white' : 'bg-blue-600 text-white') }}">
                                {{ $related->type_display }}
                            </span>
                            @if($related->rating)
                            <div class="flex items-center text-sm">
                                <span class="text-yellow-400 mr-1">⭐</span>
                                <span>{{ $related->rating }}/10</span>
                            </div>
                            @endif
                        </div>
                        <h3 class="font-bold mb-2 group-hover:text-purple-400 transition-colors">
                            <a href="{{ route('reviews.show', $related) }}">{{ $related->title }}</a>
                        </h3>
                        @if($related->author_director)
                        <p class="text-gray-400 text-xs mb-2">{{ $related->author_director }}</p>
                        @endif
                        <p class="text-gray-300 text-sm">{{ Str::limit($related->excerpt, 80) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Back Button -->
        <div class="text-center mt-12">
            <a href="{{ route('reviews.index') }}" 
               class="inline-flex items-center px-8 py-4 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-colors">
                ← Voltar às Avaliações
            </a>
        </div>
    </div>
</div>

<style>
    .aspect-w-16 {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
    }
    .aspect-w-16 img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .prose-invert {
        color: #e5e7eb;
    }
    
    .prose-invert p {
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll animation for page load
    document.body.style.opacity = '0';
    document.body.style.transform = 'translateY(20px)';
    
    setTimeout(() => {
        document.body.style.transition = 'all 0.6s ease-out';
        document.body.style.opacity = '1';
        document.body.style.transform = 'translateY(0)';
    }, 100);
});
</script>
@endsection