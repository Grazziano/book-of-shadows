<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $legend['title'] }} - Lendas Urbanas</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Nosifer&family=Butcherman&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8B0000;
            --secondary-color: #2C1810;
            --accent-color: #FF6B35;
            --text-color: #F5F5DC;
            --bg-color: #0D0D0D;
            --card-bg: #1A1A1A;
            --highlight-color: #F72585;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, var(--bg-color) 0%, var(--secondary-color) 100%);
            color: var(--text-color);
            min-height: 100vh;
            line-height: 1.6;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .back-button {
            display: inline-block;
            margin: 30px 0;
            padding: 12px 24px;
            background: var(--primary-color);
            color: var(--text-color);
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .back-button:hover {
            background: transparent;
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .legend-header {
            text-align: center;
            padding: 40px 0;
            border-bottom: 3px solid var(--primary-color);
            margin-bottom: 40px;
        }

        .legend-title {
            font-family: 'Nosifer', cursive;
            font-size: 3rem;
            color: var(--highlight-color);
            text-shadow: 0 0 20px rgba(247, 37, 133, 0.5);
            margin-bottom: 20px;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 20px rgba(247, 37, 133, 0.5); }
            to { text-shadow: 0 0 30px rgba(247, 37, 133, 0.8), 0 0 40px rgba(247, 37, 133, 0.6); }
        }

        .legend-meta {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .meta-item {
            background: var(--card-bg);
            padding: 10px 20px;
            border-radius: 25px;
            border: 2px solid var(--primary-color);
            font-size: 0.9rem;
            font-weight: bold;
        }

        .danger-level {
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .danger-baixo { background: #2E7D32; color: white; }
        .danger-médio { background: #F57C00; color: white; }
        .danger-alto { background: #D32F2F; color: white; }
        .danger-extremo { background: #4A148C; color: white; }

        .legend-content {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            border: 2px solid var(--primary-color);
            margin-bottom: 40px;
        }

        .legend-image {
            text-align: center;
            font-size: 4rem;
            margin-bottom: 30px;
            filter: drop-shadow(0 0 10px rgba(247, 37, 133, 0.3));
        }

        .legend-summary {
            font-size: 1.2rem;
            font-style: italic;
            color: var(--accent-color);
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(139, 0, 0, 0.1);
            border-left: 4px solid var(--primary-color);
            border-radius: 0 8px 8px 0;
        }

        .legend-full-content {
            font-size: 1.1rem;
            line-height: 1.8;
            text-align: justify;
            margin-bottom: 30px;
        }

        .legend-full-content p {
            margin-bottom: 20px;
        }

        .tags-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid var(--primary-color);
        }

        .tags-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: var(--accent-color);
        }

        .tags-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tag {
            background: var(--primary-color);
            color: var(--text-color);
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .published-date {
            text-align: center;
            margin-top: 30px;
            font-style: italic;
            color: var(--text-color);
            opacity: 0.7;
        }

        @media (max-width: 768px) {
            .legend-title {
                font-size: 2rem;
            }

            .legend-meta {
                gap: 15px;
            }

            .meta-item {
                padding: 8px 16px;
                font-size: 0.8rem;
            }

            .legend-content {
                padding: 25px;
            }

            .legend-full-content {
                font-size: 1rem;
            }
        }

        .warning-box {
            background: linear-gradient(135deg, rgba(139, 0, 0, 0.2), rgba(139, 0, 0, 0.1));
            border: 2px solid var(--primary-color);
            border-radius: 10px;
            padding: 20px;
            margin: 30px 0;
            text-align: center;
        }

        .warning-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .warning-text {
            font-weight: bold;
            color: var(--accent-color);
        }
    </style>
</head>
<body>
    <x-header />
    
    <div class="container">
        <a href="{{ route('urban-legends') }}" class="back-button">← Voltar às Lendas Urbanas</a>

        <div class="legend-header">
            <h1 class="legend-title">{{ $legend['title'] }}</h1>
            
            <div class="legend-meta">
                <div class="meta-item">📍 {{ $legend['origin'] }}</div>
                <div class="meta-item">🏷️ {{ $legend['category'] }}</div>
                <div class="danger-level danger-{{ strtolower(str_replace(['á', 'é'], ['a', 'e'], $legend['danger_level'])) }}">
                    ⚠️ {{ $legend['danger_level'] }}
                </div>
            </div>
        </div>

        <div class="legend-content">
            <div class="legend-image">
                👻
            </div>

            @if($legend['summary'] && $legend['summary'] !== $legend['full_content'])
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

            @if(!empty($legend['tags']))
            <div class="tags-section">
                <div class="tags-title">🏷️ Tags relacionadas:</div>
                <div class="tags-list">
                    @foreach($legend['tags'] as $tag)
                        <span class="tag">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="published-date">
                📅 Publicado em: {{ \Carbon\Carbon::parse($legend['published_date'])->format('d/m/Y') }}
            </div>
        </div>
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
</body>
</html>