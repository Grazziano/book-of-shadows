@extends('layouts.main')

@section('css-adicional')
    <link href="{{ asset('css/horror-stories.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Contos de Terror</h1>
            <p class="page-subtitle">
                Mergulhe nas páginas mais sombrias da literatura de horror.
                Cada conto é uma jornada através dos medos mais profundos da alma humana.
            </p>
        </div>
    </div>

    <div class="container">
        <a href="/" class="back-button">← Voltar ao Início</a>

        <div class="filter-section">
            <h3 style="color: var(--text-color); margin-bottom: 20px; font-family: 'Butcherman', cursive;">Filtrar por
                Categoria</h3>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Todos</button>
                <button class="filter-btn" data-filter="Fantasmas">Fantasmas</button>
                <button class="filter-btn" data-filter="Sobrenatural">Sobrenatural</button>
                <button class="filter-btn" data-filter="Terror Psicológico">Terror Psicológico</button>
                <button class="filter-btn" data-filter="Mistério">Mistério</button>
            </div>
        </div>

        <div class="stories-grid">
            @foreach ($stories as $index => $story)
                <article class="story-card loading-animation" data-category="{{ $story['category'] }}"
                    style="animation-delay: {{ $index * 0.15 }}s">
                    <div class="horror-level horror-{{ strtolower($story['horror_level']) }}">
                        {{ $story['horror_level'] }}
                    </div>

                    <header class="story-header">
                        <h2 class="story-title">{{ $story['title'] }}</h2>
                        <p class="story-author">por {{ $story['author'] }}</p>
                    </header>

                    <div class="story-content">
                        <p class="story-summary">{{ $story['summary'] }}</p>

                        <blockquote class="story-preview">
                            "{{ $story['content_preview'] }}"
                        </blockquote>

                        <div class="story-meta">
                            <span class="meta-item">
                                📖 {{ $story['reading_time'] }}
                            </span>
                            <span class="meta-item">
                                🏷️ {{ $story['category'] }}
                            </span>
                            <span class="meta-item">
                                📅 {{ date('d/m/Y', strtotime($story['published_date'])) }}
                            </span>
                        </div>

                        <div class="story-tags">
                            @if (!empty($story['tags']))
                                @foreach ($story['tags'] as $tag)
                                    <span class="tag">{{ $tag }}</span>
                                @endforeach
                            @endif
                        </div>

                        <a href="{{ route('horror-stories.show', $story['id']) }}" class="read-more-btn">Ler Conto
                            Completo</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>

    <script>
        // Sistema de filtros
        const filterButtons = document.querySelectorAll('.filter-btn');
        const storyCards = document.querySelectorAll('.story-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const filterValue = button.getAttribute('data-filter');

                storyCards.forEach(card => {
                    if (filterValue === 'all' || card.getAttribute('data-category') ===
                        filterValue) {
                        card.style.display = 'block';
                        card.style.animation = 'fadeInRotate 0.6s ease forwards';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Animações de entrada
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.loading-animation').forEach(card => {
            card.style.animationPlayState = 'paused';
            observer.observe(card);
        });

        // Efeitos de hover aprimorados
        storyCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'rotate(0deg) translateY(-15px) scale(1.02)';
                this.style.zIndex = '10';
            });

            card.addEventListener('mouseleave', function() {
                const isEven = Array.from(storyCards).indexOf(this) % 2 === 1;
                const rotation = isEven ? '0.5deg' : '-0.5deg';
                this.style.transform = `rotate(${rotation}) translateY(0) scale(1)`;
                this.style.zIndex = '1';
            });
        });

        // Efeito de digitação no título
        const title = document.querySelector('.page-title');
        const originalText = title.textContent;
        title.textContent = '';

        let i = 0;
        const typeWriter = () => {
            if (i < originalText.length) {
                title.textContent += originalText.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            }
        };

        setTimeout(typeWriter, 500);
    </script>
@endsection
