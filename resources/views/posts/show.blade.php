@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <article class="post-article">
                <header class="post-header">
                    <h1 class="post-title">{{ $post->title }}</h1>
                    <div class="post-meta">
                        <span class="post-date">📅 {{ $post->published_at->format('d/m/Y') }}</span>
                        @if($post->category)
                            <span class="post-category">🏷️ {{ $post->category->name }}</span>
                        @endif
                        @if($post->user)
                            <span class="post-author">✍️ {{ $post->user->name }}</span>
                        @endif
                    </div>
                    @if($post->excerpt)
                        <div class="post-excerpt">
                            {{ $post->excerpt }}
                        </div>
                    @endif
                </header>

                @if($post->featured_image)
                    <div class="post-image">
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="img-fluid">
                    </div>
                @endif

                <div class="post-content">
                    {!! $post->content !!}
                </div>

                @if($post->tags->count() > 0)
                    <div class="post-tags">
                        <strong>Tags:</strong>
                        @foreach($post->tags as $tag)
                            <span class="tag">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif
            </article>

            <div class="post-navigation">
                <a href="{{ route('macabre-newsletter') }}" class="btn btn-secondary">
                    ← Voltar ao Boletim Macabro
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .post-article {
        background: var(--card-bg, #1a1a1a);
        border: 1px solid var(--border-color, #333);
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: var(--text-color, #e0e0e0);
    }

    .post-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border-color, #333);
        padding-bottom: 1rem;
    }

    .post-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: var(--accent-color, #ff6b6b);
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .post-meta {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        color: var(--secondary-color, #999);
        flex-wrap: wrap;
    }

    .post-excerpt {
        font-size: 1.2rem;
        font-style: italic;
        color: var(--secondary-color, #999);
        margin-top: 1rem;
        padding: 1rem;
        background: rgba(255, 107, 107, 0.1);
        border-left: 4px solid var(--accent-color, #ff6b6b);
        border-radius: 4px;
    }

    .post-image {
        margin: 2rem 0;
        text-align: center;
    }

    .post-image img {
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .post-content {
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .post-content h1,
    .post-content h2,
    .post-content h3,
    .post-content h4,
    .post-content h5,
    .post-content h6 {
        color: var(--accent-color, #ff6b6b);
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .post-content p {
        margin-bottom: 1rem;
    }

    .post-content blockquote {
        border-left: 4px solid var(--accent-color, #ff6b6b);
        padding-left: 1rem;
        margin: 1.5rem 0;
        font-style: italic;
        background: rgba(255, 107, 107, 0.1);
        padding: 1rem;
        border-radius: 4px;
    }

    .post-tags {
        margin-top: 2rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border-color, #333);
    }

    .tag {
        display: inline-block;
        background: var(--accent-color, #ff6b6b);
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.8rem;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .post-navigation {
        text-align: center;
        margin-top: 2rem;
    }

    .btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: var(--secondary-color, #666);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn:hover {
        background: var(--accent-color, #ff6b6b);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
    }

    .btn-secondary {
        background: var(--secondary-color, #666);
    }

    .btn-secondary:hover {
        background: var(--accent-color, #ff6b6b);
    }

    @media (max-width: 768px) {
        .post-title {
            font-size: 2rem;
        }
        
        .post-meta {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .post-article {
            padding: 1rem;
        }
    }
</style>
@endsection