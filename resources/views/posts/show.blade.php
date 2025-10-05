<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Boletim Macabro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Nosifer&family=Butcherman&family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a0b2e;
            --secondary-color: #7209b7;
            --accent-color: #f72585;
            --text-color: #e0e0e0;
            --bg-dark: #0d0d0d;
            --card-bg: rgba(26, 11, 46, 0.9);
            --border-color: rgba(114, 9, 183, 0.3);
            --urgent-color: #ff4757;
            --warning-color: #ffa502;
            --info-color: #3742fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Crimson Text', serif;
            background: linear-gradient(135deg, var(--bg-dark) 0%, var(--primary-color) 100%);
            color: var(--text-color);
            min-height: 100vh;
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        .post-article {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 15px;
            padding: 3rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 0.8s ease-out;
        }

        .post-header {
            margin-bottom: 2rem;
            text-align: center;
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 2rem;
        }

        .post-title {
            font-family: 'Butcherman', cursive;
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            line-height: 1.2;
        }

        .post-meta {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .post-meta span {
            background: rgba(114, 9, 183, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            border: 1px solid var(--secondary-color);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .post-excerpt {
            font-style: italic;
            font-size: 1.1rem;
            color: var(--warning-color);
            text-align: center;
            margin-top: 1rem;
            padding: 1rem;
            background: rgba(255, 165, 2, 0.1);
            border-radius: 10px;
            border-left: 4px solid var(--warning-color);
        }

        .post-image {
            margin: 2rem 0;
            text-align: center;
        }

        .post-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
            margin: 2rem 0;
        }

        .post-content p {
            margin-bottom: 1.5rem;
        }

        .post-content h1, .post-content h2, .post-content h3 {
            color: var(--accent-color);
            margin: 2rem 0 1rem 0;
            font-family: 'Butcherman', cursive;
        }

        .post-content blockquote {
            border-left: 4px solid var(--accent-color);
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            background: rgba(247, 37, 133, 0.1);
            padding: 1rem 1.5rem;
            border-radius: 0 10px 10px 0;
        }

        .post-tags {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
            text-align: center;
        }

        .post-tags strong {
            color: var(--accent-color);
            font-family: 'Butcherman', cursive;
            margin-right: 1rem;
        }

        .tag {
            display: inline-block;
            background: var(--secondary-color);
            color: white;
            padding: 0.3rem 0.8rem;
            margin: 0.2rem;
            border-radius: 15px;
            font-size: 0.9rem;
            border: 1px solid var(--accent-color);
            transition: all 0.3s ease;
        }

        .tag:hover {
            background: var(--accent-color);
            transform: scale(1.05);
        }

        .post-navigation {
            text-align: center;
            margin-top: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            background: linear-gradient(45deg, var(--secondary-color), var(--accent-color));
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            font-family: 'Butcherman', cursive;
            transition: all 0.3s ease;
            border: 2px solid var(--accent-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(247, 37, 133, 0.4);
            background: linear-gradient(45deg, var(--accent-color), var(--secondary-color));
        }

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

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .post-article {
                padding: 2rem 1.5rem;
            }

            .post-title {
                font-size: 2rem;
            }

            .post-meta {
                flex-direction: column;
                gap: 1rem;
            }

            .post-meta span {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
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
                    <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}">
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
            <a href="{{ route('macabre-newsletter') }}" class="btn">
                ← Voltar ao Boletim Macabro
            </a>
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
