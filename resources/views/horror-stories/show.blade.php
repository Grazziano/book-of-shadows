@extends('layouts.main')

@section('css-adicional')
    <link href="{{ asset('css/horror-stories-create.css') }}" rel="stylesheet">
@endsection

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
                        <span
                            class="horror-level horror-level-{{ strtolower(str_replace(['á', 'é'], ['a', 'e'], $story['horror_level'])) }}">
                            {{ $story['horror_level'] }}
                        </span>
                    </div>

                    <div class="story-info">
                        <span class="category">{{ $story['category'] }}</span>
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
                @if (!empty($story['tags']))
                    <div class="story-tags">
                        <h3>Tags:</h3>
                        <div class="tags-list">
                            @foreach ($story['tags'] as $tag)
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

            @include('components.comments', [
                'targetType' => 'horror-stories',
                'targetId' => $story['id'],
                'comments' => $comments,
            ])
        </div>
    </div>
@endsection
