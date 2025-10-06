@extends('layouts.app')

@section('title', 'Dicas e Avaliações')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 via-purple-900 to-black text-white">
    <!-- Header Section -->
    <div class="relative py-20 px-4">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-6xl mx-auto text-center">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-red-600">
                {{ $type ? ucfirst($type === 'movie' ? 'Filmes' : ($type === 'book' ? 'Livros' : 'Séries')) : 'Dicas e Avaliações' }}
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto">
                {{ $type ? 'Descubra as melhores recomendações de ' . ($type === 'movie' ? 'filmes' : ($type === 'book' ? 'livros' : 'séries')) . ' de terror e suspense' : 'Descubra filmes, livros e séries que vão arrepiar sua alma' }}
            </p>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="max-w-6xl mx-auto px-4 mb-12">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('reviews.index') }}" 
               class="px-6 py-3 rounded-full border-2 transition-all duration-300 {{ !$type ? 'bg-purple-600 border-purple-600 text-white' : 'border-purple-600 text-purple-400 hover:bg-purple-600 hover:text-white' }}">
                Todos
            </a>
            <a href="{{ route('reviews.movies') }}" 
               class="px-6 py-3 rounded-full border-2 transition-all duration-300 {{ $type === 'movie' ? 'bg-red-600 border-red-600 text-white' : 'border-red-600 text-red-400 hover:bg-red-600 hover:text-white' }}">
                🎬 Filmes
            </a>
            <a href="{{ route('reviews.books') }}" 
               class="px-6 py-3 rounded-full border-2 transition-all duration-300 {{ $type === 'book' ? 'bg-green-600 border-green-600 text-white' : 'border-green-600 text-green-400 hover:bg-green-600 hover:text-white' }}">
                📚 Livros
            </a>
            <a href="{{ route('reviews.series') }}" 
               class="px-6 py-3 rounded-full border-2 transition-all duration-300 {{ $type === 'series' ? 'bg-blue-600 border-blue-600 text-white' : 'border-blue-600 text-blue-400 hover:bg-blue-600 hover:text-white' }}">
                📺 Séries
            </a>
        </div>
    </div>

    <!-- Featured Reviews -->
    @if($featuredReviews->count() > 0)
    <div class="max-w-6xl mx-auto px-4 mb-16">
        <h2 class="text-3xl font-bold mb-8 text-center">✨ Destaques</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($featuredReviews as $review)
            <div class="group relative bg-gray-800 rounded-lg overflow-hidden shadow-2xl transform hover:scale-105 transition-all duration-300">
                @if($review->image_url)
                <div class="aspect-w-16 aspect-h-9 bg-gray-700">
                    <img src="{{ $review->image_url }}" alt="{{ $review->title }}" class="w-full h-48 object-cover">
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            {{ $review->type === 'movie' ? 'bg-red-600 text-white' : 
                               ($review->type === 'book' ? 'bg-green-600 text-white' : 'bg-blue-600 text-white') }}">
                            {{ $review->type_display }}
                        </span>
                        @if($review->rating)
                        <div class="flex items-center">
                            <span class="text-yellow-400 mr-1">⭐</span>
                            <span class="font-bold">{{ $review->rating }}/10</span>
                        </div>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-purple-400 transition-colors">
                        <a href="{{ route('reviews.show', $review) }}">{{ $review->title }}</a>
                    </h3>
                    @if($review->author_director)
                    <p class="text-gray-400 text-sm mb-2">{{ $review->author_director }}</p>
                    @endif
                    <p class="text-gray-300 text-sm">{{ $review->excerpt }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- All Reviews -->
    <div class="max-w-6xl mx-auto px-4 pb-16">
        <h2 class="text-3xl font-bold mb-8 text-center">
            {{ $type ? 'Todas as ' . ($type === 'movie' ? 'Avaliações de Filmes' : ($type === 'book' ? 'Resenhas de Livros' : 'Reviews de Séries')) : 'Todas as Avaliações' }}
        </h2>
        
        @if($reviews->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($reviews as $review)
            <div class="group bg-gray-800 rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                @if($review->image_url)
                <div class="aspect-w-16 aspect-h-9 bg-gray-700">
                    <img src="{{ $review->image_url }}" alt="{{ $review->title }}" class="w-full h-48 object-cover">
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            {{ $review->type === 'movie' ? 'bg-red-600 text-white' : 
                               ($review->type === 'book' ? 'bg-green-600 text-white' : 'bg-blue-600 text-white') }}">
                            {{ $review->type_display }}
                        </span>
                        @if($review->rating)
                        <div class="flex items-center">
                            <span class="text-yellow-400 mr-1">⭐</span>
                            <span class="font-bold">{{ $review->rating }}/10</span>
                        </div>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-purple-400 transition-colors">
                        <a href="{{ route('reviews.show', $review) }}">{{ $review->title }}</a>
                    </h3>
                    @if($review->author_director)
                    <p class="text-gray-400 text-sm mb-2">{{ $review->author_director }}</p>
                    @endif
                    @if($review->release_year)
                    <p class="text-gray-500 text-xs mb-2">{{ $review->release_year }}</p>
                    @endif
                    <p class="text-gray-300 text-sm mb-4">{{ $review->excerpt }}</p>
                    <a href="{{ route('reviews.show', $review) }}" 
                       class="inline-flex items-center text-purple-400 hover:text-purple-300 transition-colors">
                        Ler mais →
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $reviews->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <div class="text-6xl mb-4">📚</div>
            <h3 class="text-2xl font-bold mb-4">Nenhuma avaliação encontrada</h3>
            <p class="text-gray-400">
                {{ $type ? 'Não há avaliações de ' . ($type === 'movie' ? 'filmes' : ($type === 'book' ? 'livros' : 'séries')) . ' disponíveis no momento.' : 'Não há avaliações disponíveis no momento.' }}
            </p>
        </div>
        @endif
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
</style>
@endsection