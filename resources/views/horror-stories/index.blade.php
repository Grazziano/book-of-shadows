<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contos de Terror - Boletim Macabro</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Nosifer&family=Butcherman&family=Crimson+Text:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8B0000;
            --secondary-color: #2C1810;
            --accent-color: #FF6B35;
            --text-color: #F5F5DC;
            --bg-color: #0D0D0D;
            --card-bg: #1A1A1A;
            --paper-color: #F4F1E8;
            --ink-color: #2C2C2C;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Crimson Text', serif;
            background: linear-gradient(135deg, var(--bg-color) 0%, var(--secondary-color) 100%);
            color: var(--text-color);
            min-height: 100vh;
            line-height: 1.7;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            padding: 80px 0;
            background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="manuscript" patternUnits="userSpaceOnUse" width="100" height="20"><line x1="0" y1="10" x2="100" y2="10" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23manuscript)"/></svg>');
            background-size: cover;
            background-position: center;
            border-bottom: 3px solid var(--primary-color);
            position: relative;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text x="50" y="50" font-family="serif" font-size="60" fill="rgba(139,0,0,0.1)" text-anchor="middle" dominant-baseline="middle">📚</text></svg>');
            background-size: 200px 200px;
            opacity: 0.3;
        }

        .page-title {
            font-family: 'Nosifer', cursive;
            font-size: 4rem;
            /* color: var(--primary-color);
            text-shadow: 3px 3px 6px rgba(0,0,0,0.8); */
            color: var(--highlight-color);
            text-shadow: 0 0 20px rgba(247, 37, 133, 0.5);
            margin-bottom: 20px;
            animation: flicker 3s ease-in-out infinite alternate;
            position: relative;
            z-index: 1;
        }

        @keyframes flicker {
            0%, 100% {
                text-shadow: 3px 3px 6px rgba(0,0,0,0.8), 0 0 20px var(--primary-color);
            }
            50% {
                text-shadow: 3px 3px 6px rgba(0,0,0,0.8), 0 0 30px var(--primary-color), 0 0 40px var(--primary-color);
            }
        }

        .page-subtitle {
            font-size: 1.3rem;
            color: var(--text-color);
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
            font-style: italic;
            position: relative;
            z-index: 1;
        }

        .stories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px;
            padding: 80px 0;
        }

        .story-card {
            background: var(--paper-color);
            color: var(--ink-color);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.6);
            transition: all 0.4s ease;
            border: 1px solid #D4C5A9;
            position: relative;
            transform: rotate(-0.5deg);
        }

        .story-card:nth-child(even) {
            transform: rotate(0.5deg);
        }

        .story-card:hover {
            transform: rotate(0deg) translateY(-15px);
            box-shadow: 0 25px 50px rgba(139,0,0,0.4);
            border-color: var(--primary-color);
        }

        .story-header {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: var(--text-color);
            padding: 25px;
            position: relative;
        }

        .story-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="ink" patternUnits="userSpaceOnUse" width="20" height="20"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23ink)"/></svg>');
            opacity: 0.3;
        }

        .horror-level {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
            z-index: 2;
        }

        .horror-extremo {
            background: #DC143C;
            color: white;
            box-shadow: 0 0 15px rgba(220, 20, 60, 0.5);
        }

        .horror-alto {
            background: #FF4500;
            color: white;
            box-shadow: 0 0 15px rgba(255, 69, 0, 0.5);
        }

        .horror-médio {
            background: #FF8C00;
            color: white;
            box-shadow: 0 0 15px rgba(255, 140, 0, 0.5);
        }

        .story-title {
            font-family: 'Butcherman', cursive;
            font-size: 1.8rem;
            margin-bottom: 10px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            position: relative;
            z-index: 1;
        }

        .story-author {
            font-size: 1rem;
            opacity: 0.9;
            font-style: italic;
            position: relative;
            z-index: 1;
        }

        .story-content {
            padding: 30px;
            background: var(--paper-color);
        }

        .story-summary {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: justify;
        }

        .story-preview {
            background: rgba(139,0,0,0.1);
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            margin: 20px 0;
            font-style: italic;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0 5px 5px 0;
        }

        .story-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 20px 0;
            font-size: 0.9rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            background: rgba(139,0,0,0.1);
            padding: 5px 10px;
            border-radius: 15px;
            border: 1px solid rgba(139,0,0,0.3);
        }

        .story-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
        }

        .tag {
            background: var(--secondary-color);
            color: var(--text-color);
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            border: 1px solid var(--primary-color);
        }

        .read-more-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: var(--primary-color);
            color: var(--text-color);
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 600;
            border: 2px solid var(--primary-color);
            font-family: 'Crimson Text', serif;
        }

        .read-more-btn:hover {
            background: transparent;
            color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139,0,0,0.3);
        }

        .back-button {
            display: inline-block;
            margin: 40px 0;
            padding: 15px 30px;
            background: var(--primary-color);
            color: var(--text-color);
            text-decoration: none;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-weight: bold;
            border: 2px solid var(--primary-color);
            font-size: 1.1rem;
        }

        .back-button:hover {
            background: transparent;
            /* color: var(--primary-color); */
            color: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(139,0,0,0.4);
        }

        .filter-section {
            text-align: center;
            margin: 40px 0;
        }

        .filter-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .filter-btn {
            padding: 10px 20px;
            background: transparent;
            color: var(--text-color);
            border: 2px solid var(--primary-color);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-color);
            color: var(--text-color);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.8rem;
            }

            .stories-grid {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 50px 0;
            }

            .story-card {
                margin: 0 10px;
                transform: rotate(0deg);
            }

            .story-card:nth-child(even) {
                transform: rotate(0deg);
            }
        }

        .loading-animation {
            opacity: 0;
            transform: translateY(50px) rotate(3deg);
            animation: fadeInRotate 0.8s ease forwards;
        }

        @keyframes fadeInRotate {
            to {
                opacity: 1;
                transform: translateY(0) rotate(-0.5deg);
            }
        }

        .loading-animation:nth-child(even) {
            animation: fadeInRotateReverse 0.8s ease forwards;
        }

        @keyframes fadeInRotateReverse {
            to {
                opacity: 1;
                transform: translateY(0) rotate(0.5deg);
            }
        }
    </style>
</head>
<body>
    <x-header />

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
            <h3 style="color: var(--text-color); margin-bottom: 20px; font-family: 'Butcherman', cursive;">Filtrar por Categoria</h3>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Todos</button>
                <button class="filter-btn" data-filter="Fantasmas">Fantasmas</button>
                <button class="filter-btn" data-filter="Sobrenatural">Sobrenatural</button>
                <button class="filter-btn" data-filter="Terror Psicológico">Terror Psicológico</button>
                <button class="filter-btn" data-filter="Mistério">Mistério</button>
            </div>
        </div>

        <div class="stories-grid">
            @foreach($stories as $index => $story)
                <article class="story-card loading-animation" data-category="{{ $story['category'] }}" style="animation-delay: {{ $index * 0.15 }}s">
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
                            @if(!empty($story['tags']))
                                @foreach($story['tags'] as $tag)
                                    <span class="tag">{{ $tag }}</span>
                                @endforeach
                            @endif
                        </div>

                        <a href="{{ route('horror-stories.show', $story['id']) }}" class="read-more-btn">Ler Conto Completo</a>
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
                    if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
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
</body>
</html>
