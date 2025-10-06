<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>História do Halloween - Book of Shadows</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Nosifer&family=Butcherman&family=Crimson+Text:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #8B0000;
            --secondary-color: #2C1810;
            --accent-color: #FF6B35;
            --text-color: #F5F5DC;
            --bg-color: #0D0D0D;
            --card-bg: #1A1A1A;
            --orange-glow: #FF8C00;
            --purple-glow: #8A2BE2;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Crimson Text', serif;
            background: linear-gradient(135deg, var(--bg-color) 0%, var(--secondary-color) 50%, #1a0d00 100%);
            color: var(--text-color);
            min-height: 100vh;
            line-height: 1.7;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            padding: 100px 0 80px;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 140, 0, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(138, 43, 226, 0.3) 0%, transparent 50%),
                linear-gradient(135deg, rgba(0,0,0,0.9) 0%, rgba(139,0,0,0.8) 100%);
            position: relative;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="bats" patternUnits="userSpaceOnUse" width="50" height="50"><path d="M25,25 L20,20 L15,25 L20,30 Z M30,25 L35,20 L40,25 L35,30 Z" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23bats)"/></svg>');
            opacity: 0.3;
        }

        .page-title {
            font-family: 'Creepster', cursive;
            font-size: 4rem;
            color: var(--orange-glow);
            text-shadow: 
                0 0 20px var(--orange-glow),
                0 0 40px var(--orange-glow),
                0 0 60px var(--orange-glow);
            margin-bottom: 20px;
            animation: flicker 3s infinite alternate;
            position: relative;
            z-index: 2;
        }

        @keyframes flicker {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .page-subtitle {
            font-size: 1.3rem;
            color: var(--text-color);
            max-width: 600px;
            margin: 0 auto;
            font-style: italic;
            position: relative;
            z-index: 2;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--accent-color);
            text-decoration: none;
            font-size: 1.1rem;
            margin-bottom: 40px;
            padding: 12px 20px;
            border: 2px solid var(--accent-color);
            border-radius: 25px;
            transition: all 0.3s ease;
            background: rgba(255, 107, 53, 0.1);
        }

        .back-button:hover {
            background: var(--accent-color);
            color: var(--bg-color);
            transform: translateX(-5px);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
        }

        .intro-section {
            background: rgba(26, 26, 26, 0.9);
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 60px;
            border: 2px solid var(--primary-color);
            box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
            position: relative;
        }

        .intro-section::before {
            content: '🎃';
            position: absolute;
            top: -15px;
            left: 30px;
            font-size: 2rem;
            background: var(--card-bg);
            padding: 0 15px;
        }

        .timeline {
            position: relative;
            margin: 60px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, var(--orange-glow), var(--purple-glow));
            transform: translateX(-50%);
            box-shadow: 0 0 20px var(--orange-glow);
        }

        .timeline-item {
            position: relative;
            margin: 80px 0;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .timeline-item:nth-child(even) {
            animation-delay: 0.2s;
        }

        .timeline-item:nth-child(odd) {
            animation-delay: 0.4s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .timeline-content {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 15px;
            width: 45%;
            position: relative;
            border: 2px solid var(--primary-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(139, 0, 0, 0.4);
        }

        .timeline-item:nth-child(odd) .timeline-content {
            margin-left: auto;
            margin-right: 55%;
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-left: 55%;
        }

        .timeline-date {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: var(--orange-glow);
            color: var(--bg-color);
            padding: 15px 25px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 0 30px var(--orange-glow);
            z-index: 10;
            font-family: 'Butcherman', cursive;
        }

        .timeline-title {
            font-family: 'Butcherman', cursive;
            font-size: 1.8rem;
            color: var(--accent-color);
            margin-bottom: 15px;
            text-shadow: 0 0 10px var(--accent-color);
        }

        .timeline-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-color);
        }

        .timeline-icon {
            position: absolute;
            left: 50%;
            top: 20px;
            transform: translateX(-50%);
            font-size: 2rem;
            color: var(--purple-glow);
            z-index: 5;
        }

        .fun-facts {
            background: linear-gradient(135deg, var(--card-bg) 0%, rgba(138, 43, 226, 0.2) 100%);
            padding: 40px;
            border-radius: 15px;
            margin: 60px 0;
            border: 2px solid var(--purple-glow);
            box-shadow: 0 10px 30px rgba(138, 43, 226, 0.3);
        }

        .fun-facts h2 {
            font-family: 'Nosifer', cursive;
            font-size: 2.5rem;
            color: var(--purple-glow);
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 0 0 20px var(--purple-glow);
        }

        .facts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .fact-card {
            background: rgba(26, 26, 26, 0.8);
            padding: 25px;
            border-radius: 10px;
            border-left: 5px solid var(--orange-glow);
            transition: all 0.3s ease;
        }

        .fact-card:hover {
            transform: translateX(10px);
            box-shadow: 0 5px 20px rgba(255, 140, 0, 0.3);
        }

        .fact-icon {
            font-size: 2rem;
            color: var(--orange-glow);
            margin-bottom: 15px;
        }

        .fact-title {
            font-family: 'Butcherman', cursive;
            font-size: 1.3rem;
            color: var(--accent-color);
            margin-bottom: 10px;
        }

        .modern-halloween {
            background: rgba(26, 26, 26, 0.9);
            padding: 50px;
            border-radius: 15px;
            margin: 60px 0;
            border: 2px solid var(--accent-color);
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
            text-align: center;
        }

        .modern-halloween h2 {
            font-family: 'Creepster', cursive;
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 30px;
            text-shadow: 0 0 20px var(--accent-color);
        }

        .pumpkin-decoration {
            position: fixed;
            font-size: 3rem;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
            z-index: -1;
        }

        .pumpkin-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .pumpkin-2 { top: 60%; right: 15%; animation-delay: 2s; }
        .pumpkin-3 { bottom: 20%; left: 20%; animation-delay: 4s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }

            .timeline::before {
                left: 30px;
            }

            .timeline-content {
                width: calc(100% - 80px);
                margin-left: 80px !important;
            }

            .timeline-date {
                left: 30px;
                transform: translateY(-50%);
            }

            .timeline-icon {
                left: 30px;
            }

            .facts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <x-header />

    <!-- Decorações flutuantes -->
    <div class="pumpkin-decoration pumpkin-1">🎃</div>
    <div class="pumpkin-decoration pumpkin-2">👻</div>
    <div class="pumpkin-decoration pumpkin-3">🦇</div>

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">História do Halloween</h1>
            <p class="page-subtitle">
                Descubra as origens sombrias e a evolução da noite mais assombrada do ano
            </p>
        </div>
    </div>

    <div class="container">
        <a href="/" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Voltar ao Início
        </a>

        <div class="intro-section">
            <h2 style="font-family: 'Butcherman', cursive; font-size: 2rem; color: var(--orange-glow); margin-bottom: 20px;">
                As Raízes Ancestrais do Halloween
            </h2>
            <p style="font-size: 1.2rem; line-height: 1.8;">
                O Halloween, conhecido como a noite mais assombrada do ano, tem suas raízes profundamente enterradas 
                na história antiga. Esta celebração, que hoje associamos com fantasias, doces e travessuras, 
                nasceu de rituais sagrados e crenças sobrenaturais que remontam a mais de 2.000 anos.
            </p>
        </div>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-icon">🔥</div>
                <div class="timeline-date">2000+ anos atrás</div>
                <div class="timeline-content">
                    <h3 class="timeline-title">Samhain - O Festival Celta</h3>
                    <p class="timeline-description">
                        Os antigos celtas celebravam Samhain (pronuncia-se "sow-in") no final de outubro, 
                        marcando o fim da colheita e o início do inverno. Acreditavam que nesta noite, 
                        o véu entre o mundo dos vivos e dos mortos se tornava mais fino, permitindo que 
                        espíritos retornassem à Terra.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-icon">⛪</div>
                <div class="timeline-date">43 d.C.</div>
                <div class="timeline-content">
                    <h3 class="timeline-title">Conquista Romana</h3>
                    <p class="timeline-description">
                        Quando os romanos conquistaram as terras celtas, eles combinaram Samhain com seus 
                        próprios festivais: Feralia (honrando os mortos) e um dia dedicado a Pomona, 
                        deusa das frutas - origem da tradição de "bobbing for apples".
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-icon">✝️</div>
                <div class="timeline-date">Século VIII</div>
                <div class="timeline-content">
                    <h3 class="timeline-title">Cristianização</h3>
                    <p class="timeline-description">
                        O Papa Gregório III designou 1º de novembro como Dia de Todos os Santos (All Saints' Day), 
                        tentando substituir Samhain. A noite anterior ficou conhecida como All Hallows' Eve, 
                        que eventualmente se tornou Halloween.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-icon">🚢</div>
                <div class="timeline-date">1840s</div>
                <div class="timeline-content">
                    <h3 class="timeline-title">Chegada à América</h3>
                    <p class="timeline-description">
                        Imigrantes irlandeses, fugindo da Grande Fome, trouxeram suas tradições de Halloween 
                        para a América. Inicialmente limitado às comunidades irlandesas, gradualmente se 
                        espalhou por todo o país.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-icon">🎭</div>
                <div class="timeline-date">1920s-1930s</div>
                <div class="timeline-content">
                    <h3 class="timeline-title">Secularização</h3>
                    <p class="timeline-description">
                        O Halloween se tornou mais secular e comunitário. As tradições de vandalismo foram 
                        substituídas por festas organizadas, desfiles e atividades para crianças, 
                        transformando-se na celebração familiar que conhecemos hoje.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-icon">🍬</div>
                <div class="timeline-date">1950s</div>
                <div class="timeline-content">
                    <h3 class="timeline-title">Era dos Doces</h3>
                    <p class="timeline-description">
                        O "trick-or-treating" se tornou uma tradição nacional nos EUA. As empresas de doces 
                        começaram a comercializar produtos específicos para Halloween, estabelecendo a 
                        conexão duradoura entre a data e os doces.
                    </p>
                </div>
            </div>
        </div>

        <div class="fun-facts">
            <h2>Curiosidades Assombradas</h2>
            <div class="facts-grid">
                <div class="fact-card">
                    <div class="fact-icon">🎃</div>
                    <h3 class="fact-title">Jack-o'-Lantern Original</h3>
                    <p>Na Irlanda, as primeiras "lanternas do Jack" eram feitas de nabos, batatas e beterrabas. 
                    As abóboras só foram adotadas quando a tradição chegou à América.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon">🦇</div>
                    <h3 class="fact-title">Morcegos e Halloween</h3>
                    <p>A associação com morcegos vem dos festivais celtas, onde grandes fogueiras atraíam 
                    insetos, que por sua vez atraíam morcegos - criando uma atmosfera naturalmente sombria.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon">🐱</div>
                    <h3 class="fact-title">Gatos Pretos</h3>
                    <p>Na Idade Média, acreditava-se que gatos pretos eram familiares de bruxas. 
                    Ironicamente, em algumas culturas, eles são símbolos de boa sorte.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon">👻</div>
                    <h3 class="fact-title">Fantasias</h3>
                    <p>Originalmente, as pessoas se vestiam como fantasmas e demônios para se disfarçar 
                    dos espíritos malignos que supostamente vagavam na noite de Samhain.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon">🕷️</div>
                    <h3 class="fact-title">Aranhas da Sorte</h3>
                    <p>Ver uma aranha no Halloween é considerado sinal de boa sorte, pois significa que 
                    o espírito de um ente querido está cuidando de você.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon">🌙</div>
                    <h3 class="fact-title">Lua Cheia</h3>
                    <p>Uma lua cheia no Halloween é rara - a próxima ocorrerá em 2039. A última foi em 2020, 
                    tornando aquele Halloween particularmente "mágico".</p>
                </div>
            </div>
        </div>

        <div class="modern-halloween">
            <h2>Halloween Hoje</h2>
            <p style="font-size: 1.3rem; line-height: 1.8; margin-bottom: 30px;">
                Atualmente, o Halloween é a segunda maior celebração comercial nos Estados Unidos, 
                movimentando bilhões de dólares anualmente. A tradição se espalhou pelo mundo, 
                adaptando-se às culturas locais enquanto mantém seu espírito de mistério e diversão.
            </p>
            <p style="font-size: 1.2rem; line-height: 1.8; color: var(--orange-glow);">
                Do antigo ritual celta aos filmes de terror modernos, o Halloween continua a nos fascinar 
                com sua mistura única de medo e diversão, tradição e inovação, sagrado e profano.
            </p>
        </div>
    </div>

    <script>
        // Animação de entrada para os itens da timeline
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

        document.querySelectorAll('.timeline-item').forEach(item => {
            observer.observe(item);
        });

        // Efeito de parallax suave para as decorações
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelectorAll('.pumpkin-decoration');
            
            parallax.forEach((element, index) => {
                const speed = 0.5 + (index * 0.1);
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    </script>
</body>
</html>