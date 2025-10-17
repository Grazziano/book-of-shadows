<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book of Shadows - Seu Grimório Digital</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=EB+Garamond:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #000000; /* Preto */
            --secondary-color: #1a0a1f; /* Roxo profundo mais escuro */
            --accent-color: #c45500; /* Laranja queimado */
            --highlight-color: #8b0000; /* Vermelho sangue */
            --text-color: #a9a9a9; /* Cinza */
            --shadow-color: rgba(0, 0, 0, 0.9);
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--primary-color);
            background-image: url('https://www.transparenttextures.com/patterns/black-paper.png');
            color: var(--text-color);
            font-family: 'EB Garamond', serif;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: var(--secondary-color);
            padding: 20px 0;
            box-shadow: 0 4px 12px var(--shadow-color);
            position: relative;
            overflow: hidden;
        }

        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://www.transparenttextures.com/patterns/skulls.png');
            opacity: 0.1;
            z-index: 0;
        }

        .auth-buttons {
            display: flex;
            gap: 10px;
            position: relative;
            z-index: 1;
        }

        .btn-login, .btn-register, .btn-logout {
            padding: 8px 15px;
            border-radius: 3px;
            font-family: 'EB Garamond', serif;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            border: 1px solid;
            cursor: pointer;
        }

        .btn-login {
            background-color: transparent;
            color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .btn-register {
            background-color: var(--highlight-color);
            color: var(--text-color);
            border-color: var(--highlight-color);
        }

        .btn-logout {
            background-color: var(--secondary-color);
            color: var(--text-color);
            border-color: var(--secondary-color);
        }

        .btn-login:hover, .btn-register:hover, .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px var(--shadow-color);
            filter: brightness(1.2);
        }

        .header-content {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
            }

            .auth-buttons {
                margin-top: 10px;
            }
        }

        .logo {
            font-family: 'Creepster', cursive;
            font-size: 2.5rem;
            color: var(--accent-color);
            text-shadow: 2px 2px 4px var(--shadow-color);
            margin: 0;
        }

        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s;
            position: relative;
        }

        nav ul li a:hover {
            color: var(--accent-color);
        }

        nav ul li a::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--accent-color);
            transition: width 0.3s;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        .hero {
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(26, 10, 31, 0.9)), url('https://images.unsplash.com/photo-1509248961158-e54f6934749c'); */
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(26, 10, 31, 0.9)), url("{{ asset('images/haunted-mansion-hero.jpg') }}");
            background-size: cover;
            background-position: center;
            border-bottom: 3px solid var(--highlight-color);
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.8);
            border: 2px solid var(--highlight-color);
            border-radius: 5px;
            box-shadow: 0 0 30px var(--shadow-color), 0 0 15px var(--highlight-color);
            position: relative;
            z-index: 1;
        }

        .hero-content::before {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 1px solid rgba(139, 0, 0, 0.5);
            border-radius: 3px;
            z-index: -1;
        }

        .hero h1 {
            font-family: 'Creepster', cursive;
            font-size: 4.5rem;
            margin-bottom: 20px;
            color: var(--accent-color);
            text-shadow: 3px 3px 8px var(--shadow-color), 0 0 15px var(--highlight-color);
            letter-spacing: 2px;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            color: var(--text-color);
            text-shadow: 1px 1px 3px var(--shadow-color);
            font-style: italic;
        }

        .btn {
            display: inline-block;
            background-color: var(--highlight-color);
            color: var(--text-color);
            padding: 12px 30px;
            border: 1px solid var(--accent-color);
            border-radius: 3px;
            font-size: 1.1rem;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5), 0 0 10px rgba(139, 0, 0, 0.3);
            letter-spacing: 1px;
        }

        .btn:hover {
            background-color: #6b0000;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.6), 0 0 15px rgba(139, 0, 0, 0.5);
            border-color: var(--accent-color);
        }

        .features {
            padding: 80px 0;
            background-color: var(--primary-color);
            position: relative;
        }

        .features::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://www.transparenttextures.com/patterns/black-paper.png');
            opacity: 0.2;
            z-index: 0;
        }

        .section-title {
            text-align: center;
            font-family: 'Creepster', cursive;
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 50px;
            text-shadow: 2px 2px 4px var(--shadow-color);
            position: relative;
            z-index: 1;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background-color: rgba(44, 13, 26, 0.8);
            border: 1px solid var(--accent-color);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 5px 15px var(--shadow-color);
            display: block;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px var(--shadow-color);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--accent-color);
        }

        .feature-card p {
            font-size: 1.1rem;
            color: var(--text-color);
        }

        footer {
            background-color: var(--secondary-color);
            padding: 40px 0;
            text-align: center;
            position: relative;
        }

        footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://www.transparenttextures.com/patterns/skulls.png');
            opacity: 0.1;
            z-index: 0;
        }

        .footer-content {
            position: relative;
            z-index: 1;
        }

        .social-links {
            margin-bottom: 20px;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: var(--text-color);
            font-size: 1.5rem;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: var(--accent-color);
        }

        .copyright {
            font-size: 1rem;
            color: var(--text-color);
        }

        /* Animações e efeitos especiais */
        @keyframes flicker {
            0%, 100% { opacity: 1; text-shadow: 2px 2px 4px var(--shadow-color), 0 0 10px var(--highlight-color); }
            50% { opacity: 0.7; text-shadow: 2px 2px 4px var(--shadow-color), 0 0 20px var(--highlight-color); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .flicker {
            animation: flicker 3s infinite alternate;
        }

        .pulse {
            animation: pulse 4s infinite alternate;
        }

        .float {
            animation: float 6s infinite ease-in-out;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin-top: 20px;
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('components.header')

    <section class="hero">
        <div class="hero-content pulse">
            <h1 class="float">Seu Grimório Digital</h1>
            <p>Descubra os segredos ancestrais e registre sua jornada mágica neste Halloween</p>
            <a href="{{ route('register') }}" class="btn">Comece sua Jornada</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2 class="section-title">Poderes do Grimório</h2>
            <div class="features-grid">
                <a href="{{ route('grimoire.spells') }}" class="feature-card">
                    <div class="feature-icon">🔮</div>
                    <h3>Feitiços Antigos</h3>
                    <p>Acesse uma coleção de feitiços ancestrais e encantamentos poderosos para todas as ocasiões.</p>
                </a>
                <a href="{{ route('grimoire.rituals') }}" class="feature-card">
                    <div class="feature-icon">🌙</div>
                    <h3>Rituais Lunares</h3>
                    <p>Aprenda rituais alinhados com as fases da lua para potencializar suas intenções e manifestações.</p>
                </a>
                <a href="{{ route('grimoire.herbology') }}" class="feature-card">
                    <div class="feature-icon">🌿</div>
                    <h3>Herbologia Mágica</h3>
                    <p>Descubra as propriedades mágicas das ervas e como utilizá-las em seus trabalhos esotéricos.</p>
                </a>
            </div>
        </div>
    </section>

    @include('components.footer')
</body>
</html>
