<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $review->title }} - Book of Shadows</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Nosifer&family=Butcherman&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #8B0000;
            --secondary-color: #4A0E0E;
            --accent-color: #FF6B6B;
            --text-color: #E0E0E0;
            --bg-color: #1A1A1A;
            --shadow-color: rgba(139, 0, 0, 0.3);
        }
        
        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a0a1a 50%, #0a0a0a 100%);
            color: var(--text-color);
            font-family: 'Georgia', serif;
        }
        
        .hero-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ $review->image_url ?? asset("images/haunted-mansion-hero.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .content-card {
            background: linear-gradient(135deg, rgba(30, 30, 30, 0.9) 0%, rgba(20, 20, 20, 0.95) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(139, 0, 0, 0.3);
        }
        
        .rating-stars {
            color: #FFD700;
        }
        
        .smooth-scroll {
            scroll-behavior: smooth;
        }
        
        .related-card {
            transition: all 0.3s ease;
        }
        
        .related-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(139, 0, 0, 0.4);
        }
    </style>
</head>
<body class="smooth-scroll">
    @include('components.header')

    <div class="min-h-screen bg-gradient-to-b from-gray-900 via-purple-900 to-black text-white">
        <!-- Hero Section -->
        <div class="relative py-20 px-4 hero-bg">
            <div class="absolute inset-0 bg-black opacity-70"></div>
            
            <div class="relative max-w-4xl mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <a href="{{ route('reviews.index') }}" 
                           class="inline-flex items-center text-purple-400 hover:text-purple-300 transition-colors mr-4 bg-black bg-opacity-50 px-4 py-2 rounded-lg">
                            ← Voltar às avaliações
                        </a>
                        <span class="px-4 py-2 text-sm font-semibold rounded-full 
                            {{ $review->type === 'movie' ? 'bg-red-600 text-white' : 
                               ($review->type === 'book' ? 'bg-green-600 text-white' : 'bg-blue-600 text-white') }}">
                            {{ $review->type_display }}
                        </span>
                    </div>
                    
                    @if(auth()->check())
                    <a href="{{ route('reviews.edit', $review) }}" 
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-blue-700 transition-all duration-300 font-semibold">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m18 2 4 4-14 14H4v-4L18 2z"></path>
                            <path d="m14.5 5.5 4 4"></path>
                        </svg>
                        Editar
                    </a>
                    @endif
                </div>
                
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-red-600">
                    {{ $review->title }}
                </h1>
                
                <div class="flex flex-wrap items-center gap-6 text-lg">
                    @if($review->author_director)
                    <div class="flex items-center bg-black bg-opacity-50 px-4 py-2 rounded-lg">
                        <span class="text-gray-400 mr-2">
                            {{ $review->type === 'book' ? '✍️ Autor:' : '🎬 Diretor:' }}
                        </span>
                        <span class="font-semibold">{{ $review->author_director }}</span>
                    </div>
                    @endif
                    
                    @if($review->release_year)
                    <div class="flex items-center bg-black bg-opacity-50 px-4 py-2 rounded-lg">
                        <span class="text-gray-400 mr-2">📅</span>
                        <span>{{ $review->release_year }}</span>
                    </div>
                    @endif
                    
                    @if($review->genre)
                    <div class="flex items-center bg-black bg-opacity-50 px-4 py-2 rounded-lg">
                        <span class="text-gray-400 mr-2">🎭</span>
                        <span>{{ $review->genre }}</span>
                    </div>
                    @endif
                    
                    @if($review->rating)
                    <div class="flex items-center bg-black bg-opacity-50 px-4 py-2 rounded-lg">
                        <span class="rating-stars text-2xl mr-2">★</span>
                        <span class="text-yellow-400 font-bold text-xl">{{ $review->rating }}/10</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 py-16">
            <!-- Summary -->
            @if($review->summary)
            <div class="content-card rounded-lg p-8 mb-12 shadow-2xl">
                <h2 class="text-3xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-purple-600">
                    📝 Resumo
                </h2>
                <p class="text-lg leading-relaxed text-gray-300">{{ $review->summary }}</p>
            </div>
            @endif

            <!-- Main Review Content -->
            <div class="content-card rounded-lg p-8 mb-12 shadow-2xl">
                <h2 class="text-3xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-red-600">
                    🎯 Avaliação Completa
                </h2>
                <div class="prose prose-lg prose-invert max-w-none">
                    {!! nl2br(e($review->content)) !!}
                </div>
            </div>

            <!-- Trailer/Link Section -->
            @if($review->trailer_url)
            <div class="content-card rounded-lg p-8 mb-12 shadow-2xl">
                <h2 class="text-3xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-purple-600">
                    🎬 Trailer
                </h2>
                <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                    @if(str_contains($review->trailer_url, 'youtube.com') || str_contains($review->trailer_url, 'youtu.be'))
                        @php
                            $videoId = '';
                            if (str_contains($review->trailer_url, 'youtube.com/watch?v=')) {
                                $videoId = substr($review->trailer_url, strpos($review->trailer_url, 'v=') + 2);
                                $videoId = strpos($videoId, '&') !== false ? substr($videoId, 0, strpos($videoId, '&')) : $videoId;
                            } elseif (str_contains($review->trailer_url, 'youtu.be/')) {
                                $videoId = substr($review->trailer_url, strrpos($review->trailer_url, '/') + 1);
                            }
                        @endphp
                        @if($videoId)
                        <iframe 
                            class="w-full h-64 md:h-96" 
                            src="https://www.youtube.com/embed/{{ $videoId }}" 
                            frameborder="0" 
                            allowfullscreen>
                        </iframe>
                        @else
                        <a href="{{ $review->trailer_url }}" 
                           target="_blank" 
                           class="block w-full h-64 md:h-96 bg-gradient-to-r from-red-600 to-purple-600 rounded-lg flex items-center justify-center text-white text-xl font-bold hover:from-red-700 hover:to-purple-700 transition-all duration-300">
                            🎬 Assistir Trailer
                        </a>
                        @endif
                    @else
                    <a href="{{ $review->trailer_url }}" 
                       target="_blank" 
                       class="block w-full h-64 md:h-96 bg-gradient-to-r from-red-600 to-purple-600 rounded-lg flex items-center justify-center text-white text-xl font-bold hover:from-red-700 hover:to-purple-700 transition-all duration-300">
                        🎬 Assistir Trailer
                    </a>
                    @endif
                </div>
            </div>
            @endif

            <!-- Meta Information -->
            <div class="content-card rounded-lg p-8 mb-12 shadow-2xl">
                <h2 class="text-3xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-red-600">
                    ℹ️ Informações
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3 text-purple-400">Detalhes</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li><strong>Tipo:</strong> {{ $review->type_display }}</li>
                            @if($review->author_director)
                            <li><strong>{{ $review->type === 'book' ? 'Autor' : 'Diretor' }}:</strong> {{ $review->author_director }}</li>
                            @endif
                            @if($review->release_year)
                            <li><strong>Ano:</strong> {{ $review->release_year }}</li>
                            @endif
                            @if($review->genre)
                            <li><strong>Gênero:</strong> {{ $review->genre }}</li>
                            @endif
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-3 text-purple-400">Avaliação</h3>
                        @if($review->rating)
                        <div class="flex items-center mb-4">
                            <span class="rating-stars text-3xl mr-3">★</span>
                            <span class="text-2xl font-bold text-yellow-400">{{ $review->rating }}/10</span>
                        </div>
                        @endif
                        <div class="text-sm text-gray-400">
                            <p>Publicado em {{ $review->created_at->format('d/m/Y') }}</p>
                            @if($review->is_featured)
                            <p class="text-yellow-400 font-semibold mt-2">⭐ Review em Destaque</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Reviews -->
            @if(isset($relatedReviews) && $relatedReviews->count() > 0)
            <div class="content-card rounded-lg p-8 shadow-2xl">
                <h2 class="text-3xl font-bold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-purple-600">
                    🔗 Reviews Relacionadas
                </h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedReviews as $related)
                    <div class="related-card bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg overflow-hidden shadow-xl border border-gray-700">
                        @if($related->image_url)
                        <div class="h-32 bg-cover bg-center" style="background-image: url('{{ $related->image_url }}')"></div>
                        @endif
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $related->type === 'movie' ? 'bg-red-600 text-white' : 
                                       ($related->type === 'book' ? 'bg-green-600 text-white' : 'bg-blue-600 text-white') }}">
                                    {{ $related->type_display }}
                                </span>
                                @if($related->rating)
                                <div class="flex items-center">
                                    <span class="rating-stars text-sm">★</span>
                                    <span class="ml-1 text-yellow-400 text-sm font-bold">{{ $related->rating }}/10</span>
                                </div>
                                @endif
                            </div>
                            <h3 class="text-lg font-bold mb-2 text-white">{{ $related->title }}</h3>
                            @if($related->author_director)
                            <p class="text-gray-400 text-sm mb-2">{{ $related->author_director }}</p>
                            @endif
                            <a href="{{ route('reviews.show', $related) }}" 
                               class="inline-block bg-gradient-to-r from-purple-600 to-red-600 text-white px-3 py-1 rounded text-sm hover:from-purple-700 hover:to-red-700 transition-all duration-300">
                                Ler Mais
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    <script>
        // Smooth scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.content-card, .related-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            });
            
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>