<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsletter['edition'] }} - Boletim Macabro</title>
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
            --newspaper-bg: #1a1a1a;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .newspaper-header {
            text-align: center;
            border-bottom: 3px double var(--accent-color);
            padding-bottom: 2rem;
            margin-bottom: 3rem;
            animation: fadeInDown 1s ease-out;
        }

        .newspaper-title {
            font-family: 'Creepster', cursive;
            font-size: 4rem;
            color: var(--accent-color);
            text-shadow: 0 0 30px rgba(247, 37, 133, 0.8);
            margin-bottom: 0.5rem;
            animation: flicker 3s ease-in-out infinite;
        }

        .edition-info {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: var(--secondary-color);
            font-style: italic;
            margin-bottom: 1rem;
        }

        .subscription-info {
            font-size: 0.9rem;
            color: var(--text-color);
            opacity: 0.8;
        }

        @keyframes flicker {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .weather-alert {
            background: linear-gradient(45deg, var(--urgent-color), var(--warning-color));
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            text-align: center;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .featured-article {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            animation: slideInLeft 1s ease-out 0.3s both;
        }

        .featured-article::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-color), var(--secondary-color));
        }

        .featured-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .featured-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .featured-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            color: var(--secondary-color);
        }

        .featured-summary {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .article-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            animation: fadeInUp 0.8s ease-out both;
        }

        .article-card:nth-child(1) { animation-delay: 0.1s; }
        .article-card:nth-child(2) { animation-delay: 0.2s; }
        .article-card:nth-child(3) { animation-delay: 0.3s; }
        .article-card:nth-child(4) { animation-delay: 0.4s; }
        .article-card:nth-child(5) { animation-delay: 0.5s; }
        .article-card:nth-child(6) { animation-delay: 0.6s; }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            border-color: var(--secondary-color);
        }

        .urgency-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .urgency-crítica {
            background: var(--urgent-color);
            color: white;
            animation: blink 1s ease-in-out infinite;
        }

        .urgency-alta {
            background: var(--warning-color);
            color: white;
        }

        .urgency-média {
            background: var(--info-color);
            color: white;
        }

        .urgency-baixa {
            background: var(--secondary-color);
            color: white;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .article-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--accent-color);
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.8rem;
            color: var(--secondary-color);
        }

        .article-summary {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--text-color);
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

        .back-link {
            display: inline-block;
            margin-bottom: 2rem;
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: var(--accent-color);
        }

        .newsletter-footer {
            text-align: center;
            padding: 2rem;
            border-top: 2px solid var(--border-color);
            margin-top: 3rem;
            font-style: italic;
            color: var(--text-color);
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .newspaper-title {
                font-size: 2.5rem;
            }

            .featured-title {
                font-size: 1.8rem;
            }

            .articles-grid {
                grid-template-columns: 1fr;
            }

            .featured-meta {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    @include('components.header')

    <div class="container">
        <a href="/" class="back-link">← Voltar ao Início</a>
        
        <header class="newspaper-header">
            <h1 class="newspaper-title">Boletim Macabro</h1>
            <div class="edition-info">{{ $newsletter['edition'] }}</div>
            <div class="subscription-info">{{ $newsletter['subscription_count'] }} assinantes das trevas</div>
        </header>

        <div class="weather-alert">
            <strong>⚠️ Alerta Paranormal:</strong> {{ $newsletter['weather_forecast']['condition'] }} - {{ $newsletter['weather_forecast']['temperature'] }}
            <br><small>{{ $newsletter['weather_forecast']['warning'] }}</small>
        </div>

        <article class="featured-article">
            <div class="featured-badge">Destaque</div>
            <h2 class="featured-title">{{ $newsletter['featured_article']['title'] }}</h2>
            <div class="featured-meta">
                <span>📅 {{ $newsletter['featured_article']['date'] }}</span>
                <span>🏷️ {{ $newsletter['featured_article']['category'] }}</span>
            </div>
            <p class="featured-summary">{{ $newsletter['featured_article']['summary'] }}</p>
        </article>

        <section class="articles-grid">
            @foreach($newsletter['articles'] as $article)
                <article class="article-card">
                    <div class="urgency-badge urgency-{{ $article['urgency'] }}">
                        {{ ucfirst($article['urgency']) }}
                    </div>
                    <h3 class="article-title">{{ $article['title'] }}</h3>
                    <div class="article-meta">
                        <span>{{ $article['date'] }}</span>
                        <span>{{ $article['category'] }}</span>
                    </div>
                    <p class="article-summary">{{ $article['summary'] }}</p>
                </article>
            @endforeach
        </section>

        <footer class="newsletter-footer">
            <p>"A verdade está nas sombras, e nós a trazemos à luz."</p>
            <p><small>Boletim Macabro - Sua fonte confiável para o inexplicável</small></p>
        </footer>
    </div>

    <script>
        // Efeito de digitação no título
        document.addEventListener('DOMContentLoaded', function() {
            const title = document.querySelector('.newspaper-title');
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
            
            setTimeout(typeWriter, 1000);
        });

        // Animação de entrada dos cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.article-card').forEach(card => {
            observer.observe(card);
        });

        // Efeito de hover nos badges de urgência
        document.querySelectorAll('.urgency-badge').forEach(badge => {
            badge.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
            });
            
            badge.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>