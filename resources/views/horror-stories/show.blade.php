@extends('layouts.app')

@section('title', $story['title'] . ' - Contos de Terror')

@section('content')
<div class="horror-story-show">
    <!-- Header da História -->
    <div class="story-header">
        <div class="container">
            <div class="back-navigation">
                <a href="{{ route('horror-stories') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Voltar aos Contos
                </a>
            </div>
            
            <div class="story-title-section">
                <h1 class="story-title">{{ $story['title'] }}</h1>
                <div class="story-meta">
                    <span class="author">Por {{ $story['author'] }}</span>
                    <span class="separator">•</span>
                    <span class="reading-time">{{ $story['reading_time'] }}</span>
                    <span class="separator">•</span>
                    <span class="horror-level horror-level-{{ strtolower(str_replace(['á', 'é'], ['a', 'e'], $story['horror_level'])) }}">
                        {{ $story['horror_level'] }}
                    </span>
                </div>
                
                <div class="story-info">
                    <span class="category">{{ $story['category'] }}</span>
                    <span class="published-date">{{ \Carbon\Carbon::parse($story['published_date'])->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo da História -->
    <div class="story-content">
        <div class="container">
            <div class="story-text">
                {!! nl2br(e($story['full_content'])) !!}
            </div>
            
            <!-- Tags -->
            @if(!empty($story['tags']))
            <div class="story-tags">
                <h3>Tags:</h3>
                <div class="tags-list">
                    @foreach($story['tags'] as $tag)
                        <span class="tag">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Navegação -->
            <div class="story-navigation">
                <a href="{{ route('horror-stories') }}" class="nav-btn primary">
                    <i class="fas fa-list"></i>
                    Ver Todos os Contos
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.horror-story-show {
    min-height: 100vh;
    background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
    color: #e0e0e0;
    font-family: 'Georgia', serif;
}

.story-header {
    background: rgba(0, 0, 0, 0.8);
    padding: 2rem 0;
    border-bottom: 2px solid #8B0000;
    position: relative;
}

.story-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.02"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.02"/><circle cx="50" cy="10" r="0.5" fill="%23ffffff" opacity="0.03"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 1rem;
    position: relative;
    z-index: 1;
}

.back-navigation {
    margin-bottom: 1.5rem;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #ff6b6b;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    padding: 0.5rem 1rem;
    border: 1px solid transparent;
    border-radius: 5px;
}

.back-btn:hover {
    color: #ff4757;
    background: rgba(255, 107, 107, 0.1);
    border-color: #ff6b6b;
    transform: translateX(-5px);
}

.story-title {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    color: #ffffff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    line-height: 1.2;
}

.story-meta {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    color: #cccccc;
}

.separator {
    color: #666;
}

.horror-level {
    padding: 0.2rem 0.8rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: bold;
    text-transform: uppercase;
}

.horror-level-extremo {
    background: linear-gradient(45deg, #8B0000, #DC143C);
    color: white;
    box-shadow: 0 0 10px rgba(220, 20, 60, 0.5);
}

.horror-level-alto {
    background: linear-gradient(45deg, #FF4500, #FF6347);
    color: white;
    box-shadow: 0 0 8px rgba(255, 69, 0, 0.4);
}

.horror-level-medio {
    background: linear-gradient(45deg, #FFD700, #FFA500);
    color: #333;
    box-shadow: 0 0 6px rgba(255, 215, 0, 0.3);
}

.story-info {
    display: flex;
    gap: 1rem;
    font-size: 0.85rem;
    color: #aaa;
}

.category {
    background: rgba(139, 0, 0, 0.3);
    padding: 0.3rem 0.8rem;
    border-radius: 12px;
    border: 1px solid #8B0000;
}

.story-content {
    padding: 3rem 0;
}

.story-text {
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 3rem;
    text-align: justify;
    color: #e8e8e8;
}

.story-text p {
    margin-bottom: 1.5rem;
}

.story-tags {
    margin-bottom: 3rem;
    padding: 2rem;
    background: rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    border: 1px solid rgba(139, 0, 0, 0.3);
}

.story-tags h3 {
    color: #ff6b6b;
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.tags-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.tag {
    background: linear-gradient(45deg, #2c3e50, #34495e);
    color: #ecf0f1;
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-size: 0.8rem;
    border: 1px solid #4a6741;
    transition: all 0.3s ease;
}

.tag:hover {
    background: linear-gradient(45deg, #34495e, #2c3e50);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.story-navigation {
    text-align: center;
    padding: 2rem 0;
}

.nav-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    background: linear-gradient(45deg, #8B0000, #DC143C);
    color: white;
    text-decoration: none;
    border-radius: 25px;
    font-weight: bold;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
}

.nav-btn:hover {
    background: linear-gradient(45deg, #DC143C, #8B0000);
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.5);
    color: white;
}

/* Responsividade */
@media (max-width: 768px) {
    .story-title {
        font-size: 2rem;
    }
    
    .story-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.3rem;
    }
    
    .story-info {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .story-text {
        font-size: 1rem;
        line-height: 1.7;
    }
    
    .container {
        padding: 0 0.5rem;
    }
}

/* Animações */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.story-header,
.story-content {
    animation: fadeInUp 0.8s ease-out;
}

.story-content {
    animation-delay: 0.2s;
}
</style>
@endsection