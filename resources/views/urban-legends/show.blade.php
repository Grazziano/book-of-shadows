@extends('layouts.main')

@section('css-adicional')
    <link href="{{ asset('css/urban-legends-create.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('urban-legends') }}" class="back-button">← Voltar às Lendas Urbanas</a>

        <div class="legend-header">
            <h1 class="legend-title">{{ $legend['title'] }}</h1>

            <div class="legend-meta">
                <div class="meta-item">📍 {{ $legend['origin'] }}</div>
                <div class="meta-item">🏷️ {{ $legend['category'] }}</div>
                <div
                    class="danger-level danger-{{ strtolower(str_replace(['á', 'é'], ['a', 'e'], $legend['danger_level'])) }}">
                    ⚠️ {{ $legend['danger_level'] }}
                </div>
            </div>
        </div>

        <div class="legend-content">
            <div class="legend-image">
                👻
            </div>

            @if ($legend['summary'] && $legend['summary'] !== $legend['full_content'])
                <div class="legend-summary">
                    "{{ $legend['summary'] }}"
                </div>
            @endif

            <div class="warning-box">
                <div class="warning-icon">⚠️</div>
                <div class="warning-text">
                    Esta lenda urbana pode conter conteúdo perturbador.
                    Prossiga com cautela.
                </div>
            </div>

            <div class="legend-full-content">
                {!! nl2br(e($legend['full_content'])) !!}
            </div>

            @if (!empty($legend['tags']))
                <div class="tags-section">
                    <div class="tags-title">🏷️ Tags relacionadas:</div>
                    <div class="tags-list">
                        @foreach ($legend['tags'] as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="published-date">
                📅 Publicado em: {{ \Carbon\Carbon::parse($legend['published_date'])->format('d/m/Y') }}
            </div>
        </div>

        @include('components.comments', [
            'targetType' => 'urban-legends',
            'targetId' => $legend['id'],
            'comments' => $comments,
        ])
    </div>

    <script>
        // Efeito de entrada suave
        document.addEventListener('DOMContentLoaded', function() {
            const content = document.querySelector('.legend-content');
            content.style.opacity = '0';
            content.style.transform = 'translateY(30px)';

            setTimeout(() => {
                content.style.transition = 'all 0.6s ease';
                content.style.opacity = '1';
                content.style.transform = 'translateY(0)';
            }, 100);
        });

        // Efeito de hover no botão voltar
        const backButton = document.querySelector('.back-button');
        backButton.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        backButton.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    </script>
@endsection
