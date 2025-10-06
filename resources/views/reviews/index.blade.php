<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $type ? ucfirst($type === 'movie' ? 'Filmes' : ($type === 'book' ? 'Livros' : 'Séries')) : 'Dicas e Avaliações' }} - Book of Shadows</title>
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
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset("images/haunted-mansion-hero.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(139, 0, 0, 0.4);
        }
        
        .rating-stars {
            color: #FFD700;
        }
        
        .filter-tab {
            transition: all 0.3s ease;
        }
        
        .filter-tab:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }
    </style>
</head>
<body>
    @include('components.header')

    <div class="min-h-screen bg-gradient-to-b from-gray-900 via-purple-900 to-black text-white">
        <!-- Header Section -->
        <div class="relative py-20 px-4 hero-bg">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-6xl mx-auto text-center">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-red-600">
                    {{ $type ? ucfirst($type === 'movie' ? 'Filmes' : ($type === 'book' ? 'Livros' : 'Séries')) : 'Dicas e Avaliações' }}
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto mb-8">
                    {{ $type ? 'Descubra as melhores recomendações de ' . ($type === 'movie' ? 'filmes' : ($type === 'book' ? 'livros' : 'séries')) . ' de terror e suspense' : 'Descubra filmes, livros e séries que vão arrepiar sua alma' }}
                </p>
                @if(auth()->check())
                <a href="{{ route('reviews.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-purple-600 text-white px-6 py-3 rounded-lg hover:from-red-700 hover:to-purple-700 transition-all duration-300 font-semibold">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Criar Review
                </a>
                @endif
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="max-w-6xl mx-auto px-4 mb-12 mt-12">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('reviews.index') }}" 
                   class="filter-tab px-6 py-3 rounded-full border-2 transition-all duration-300 {{ !$type ? 'bg-purple-600 border-purple-600 text-white' : 'border-purple-600 text-purple-400 hover:bg-purple-600 hover:text-white' }}">
                    🎭 Todos
                </a>
                <a href="{{ route('reviews.movies') }}" 
                   class="filter-tab px-6 py-3 rounded-full border-2 transition-all duration-300 {{ $type === 'movie' ? 'bg-red-600 border-red-600 text-white' : 'border-red-600 text-red-400 hover:bg-red-600 hover:text-white' }}">
                    🎬 Filmes
                </a>
                <a href="{{ route('reviews.books') }}" 
                   class="filter-tab px-6 py-3 rounded-full border-2 transition-all duration-300 {{ $type === 'book' ? 'bg-green-600 border-green-600 text-white' : 'border-green-600 text-green-400 hover:bg-green-600 hover:text-white' }}">
                    📚 Livros
                </a>
                <a href="{{ route('reviews.series') }}" 
                   class="filter-tab px-6 py-3 rounded-full border-2 transition-all duration-300 {{ $type === 'series' ? 'bg-blue-600 border-blue-600 text-white' : 'border-blue-600 text-blue-400 hover:bg-blue-600 hover:text-white' }}">
                    📺 Séries
                </a>
            </div>
        </div>

        <!-- Featured Reviews -->
        @if($featuredReviews->count() > 0)
        <div class="max-w-6xl mx-auto px-4 mb-16">
            <h2 class="text-4xl font-bold text-center mb-12 text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-purple-600">
                ⭐ Em Destaque
            </h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredReviews as $review)
                <div class="card-hover bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg overflow-hidden shadow-2xl border border-red-900">
                    @if($review->image_url)
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $review->image_url }}')"></div>
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
                                <span class="rating-stars text-lg">★</span>
                                <span class="ml-1 text-yellow-400 font-bold">{{ $review->rating }}/10</span>
                            </div>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-white">{{ $review->title }}</h3>
                        @if($review->author_director)
                        <p class="text-gray-400 text-sm mb-2">{{ $review->author_director }}</p>
                        @endif
                        <p class="text-gray-300 text-sm mb-4">{{ $review->excerpt }}</p>
                        <a href="{{ route('reviews.show', $review) }}" 
                           class="inline-block bg-gradient-to-r from-red-600 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-red-700 hover:to-purple-700 transition-all duration-300">
                            Ler Mais
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- All Reviews -->
        <div class="max-w-6xl mx-auto px-4 pb-16">
            <h2 class="text-4xl font-bold text-center mb-12 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-red-600">
                {{ $type ? 'Todas as ' . ($type === 'movie' ? 'Avaliações de Filmes' : ($type === 'book' ? 'Resenhas de Livros' : 'Reviews de Séries')) : 'Todas as Avaliações' }}
            </h2>
            
            @if($reviews->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                <div class="card-hover bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg overflow-hidden shadow-2xl border border-gray-700">
                    @if($review->image_url)
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $review->image_url }}')"></div>
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
                                <span class="rating-stars text-lg">★</span>
                                <span class="ml-1 text-yellow-400 font-bold">{{ $review->rating }}/10</span>
                            </div>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-white">{{ $review->title }}</h3>
                        @if($review->author_director)
                        <p class="text-gray-400 text-sm mb-2">{{ $review->author_director }}</p>
                        @endif
                        @if($review->release_year)
                        <p class="text-gray-500 text-xs mb-2">{{ $review->release_year }}</p>
                        @endif
                        <p class="text-gray-300 text-sm mb-4">{{ $review->excerpt }}</p>
                        <a href="{{ route('reviews.show', $review) }}" 
                           class="inline-block bg-gradient-to-r from-purple-600 to-red-600 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-red-700 transition-all duration-300">
                            Ler Mais
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $reviews->links() }}
            </div>
            @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">👻</div>
                <h3 class="text-2xl font-bold mb-4 text-gray-300">Nenhuma avaliação encontrada</h3>
                <p class="text-gray-400">
                    {{ $type ? 'Não há ' . ($type === 'movie' ? 'filmes' : ($type === 'book' ? 'livros' : 'séries')) . ' disponíveis no momento.' : 'Não há avaliações disponíveis no momento.' }}
                </p>
            </div>
            @endif
        </div>
    </div>

    <script>
        // Smooth scroll animation for cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-hover');
            
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