<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lendas Urbanas - Boletim Macabro</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Nosifer&family=Butcherman&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8B0000;
            --secondary-color: #2C1810;
            --accent-color: #FF6B35;
            --text-color: #F5F5DC;
            --bg-color: #0D0D0D;
            --card-bg: #1A1A1A;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            padding: 60px 0;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="fog" patternUnits="userSpaceOnUse" width="100" height="100"><circle cx="50" cy="50" r="30" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23fog)"/></svg>');
            background-size: cover;
            background-position: center;
            border-bottom: 3px solid var(--primary-color);
        }

        .page-title {
            font-family: 'Nosifer', cursive;
            font-size: 3.5rem;
            /* color: var(--primary-color);
            text-shadow: 3px 3px 6px rgba(0,0,0,0.8); */
            color: var(--highlight-color);
            text-shadow: 0 0 20px rgba(247, 37, 133, 0.5);
            margin-bottom: 20px;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 3px 3px 6px rgba(0,0,0,0.8), 0 0 20px var(--primary-color); }
            to { text-shadow: 3px 3px 6px rgba(0,0,0,0.8), 0 0 30px var(--primary-color), 0 0 40px var(--primary-color); }
        }

        .page-subtitle {
            font-size: 1.2rem;
            color: var(--text-color);
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .legends-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            padding: 60px 0;
        }

        .legend-card {
            background: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
        }

        .legend-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(139,0,0,0.3);
            border-color: var(--primary-color);
        }

        .legend-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--text-color);
            position: relative;
            overflow: hidden;
        }

        .legend-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="mist" patternUnits="userSpaceOnUse" width="50" height="50"><circle cx="25" cy="25" r="15" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23mist)"/></svg>');
            opacity: 0.3;
        }

        .legend-content {
            padding: 25px;
        }

        .legend-title {
            font-family: 'Butcherman', cursive;
            font-size: 1.5rem;
            color: var(--accent-color);
            margin-bottom: 15px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .legend-summary {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
            color: var(--text-color);
            opacity: 0.9;
        }

        .legend-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .meta-tag {
            background: var(--secondary-color);
            color: var(--text-color);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            border: 1px solid var(--primary-color);
        }

        .danger-level {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .danger-alto {
            background: #DC143C;
            color: white;
        }

        .danger-médio {
            background: #FF8C00;
            color: white;
        }

        .danger-baixo {
            background: #32CD32;
            color: white;
        }

        .back-button {
            display: inline-block;
            margin: 40px 0;
            padding: 12px 25px;
            background: var(--primary-color);
            color: var(--text-color);
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: bold;
            border: 2px solid var(--primary-color);
        }

        .back-button:hover {
            background: transparent;
            /* color: var(--primary-color); */
            color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139,0,0,0.3);
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }

            .legends-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 40px 0;
            }

            .legend-card {
                margin: 0 10px;
            }
        }

        .loading-animation {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <x-header />
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
            @foreach($legends as $index => $legend)
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
</body>
</html>
