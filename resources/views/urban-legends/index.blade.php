@extends('layouts.main')

@section('css-adicional')
    <link href="{{ asset('css/urban-legends.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Lendas Urbanas</h1>
            <p class="page-subtitle">
                Explore as histórias mais assombradas e misteriosas que rondam nosso mundo.
                Cada lenda carrega consigo o peso do medo e da curiosidade humana.
            </p>
        </div>
    </div>

    <div class="container">
        <a href="/" class="back-button">← Voltar ao Início</a>

        <div class="legends-grid">
            @foreach ($legends as $index => $legend)
                <a href="{{ route('urban-legends.show', $legend['id']) }}" class="legend-link">
                    <div class="legend-card loading-animation" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="danger-level danger-{{ strtolower($legend['danger_level']) }}">
                            {{ $legend['danger_level'] }}
                        </div>

                        <div class="legend-image">
                            👻
                        </div>

                        <div class="legend-content">
                            <h3 class="legend-title">{{ $legend['title'] }}</h3>
                            <p class="legend-summary">{{ $legend['summary'] }}</p>

                            <div class="legend-meta">
                                <span class="meta-tag">📍 {{ $legend['origin'] }}</span>
                                <span class="meta-tag">🏷️ {{ $legend['category'] }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <script>
        // Adiciona efeitos de animação quando os cards entram na viewport
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

        // Efeito de hover nos cards
        document.querySelectorAll('.legend-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
@endsection
