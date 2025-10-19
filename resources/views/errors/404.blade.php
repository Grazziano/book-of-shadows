<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada | Book of Shadows</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background-color: #0a0a0a;
            color: #e0d0b8;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(28, 10, 40, 0.3) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(40, 10, 28, 0.3) 0%, transparent 20%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%233a1c4a' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
            z-index: -1;
        }

        .container {
            max-width: 700px;
            padding: 40px;
            background-color: rgba(15, 10, 25, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(120, 40, 180, 0.3);
            border: 1px solid rgba(150, 100, 200, 0.2);
            position: relative;
            z-index: 1;
        }

        .container::before {
            content: "";
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #8a2be2, #5d0e8b, #2c0752, #0a0a0a);
            border-radius: 12px;
            z-index: -1;
            opacity: 0.5;
        }

        .logo {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: #c19ee0;
            text-shadow: 0 0 10px rgba(193, 158, 224, 0.5);
            letter-spacing: 3px;
        }

        .error-code {
            font-size: 8rem;
            font-weight: bold;
            color: #8a2be2;
            text-shadow: 0 0 15px rgba(138, 43, 226, 0.7);
            margin: 20px 0;
            line-height: 1;
        }

        h1 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: #d8bfd8;
            text-shadow: 0 0 5px rgba(216, 191, 216, 0.5);
        }

        p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(to right, #5d0e8b, #8a2be2);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            box-shadow: 0 4px 10px rgba(138, 43, 226, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(138, 43, 226, 0.5);
            background: linear-gradient(to right, #6a1b9a, #9c4dcc);
        }

        .btn-secondary {
            background: transparent;
            border: 1px solid #8a2be2;
            color: #c19ee0;
        }

        .btn-secondary:hover {
            background: rgba(138, 43, 226, 0.1);
        }

        .moon {
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #f5f5dc, #d8bfd8);
            box-shadow: 0 0 40px #f5f5dc;
            top: 10%;
            right: 10%;
            opacity: 0.1;
            z-index: -1;
        }

        .crystal-ball {
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(180, 220, 255, 0.8), rgba(100, 150, 255, 0.4));
            box-shadow: 0 0 30px rgba(100, 150, 255, 0.5);
            bottom: 15%;
            left: 10%;
            opacity: 0.1;
            z-index: -1;
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .sparkle {
            position: absolute;
            width: 5px;
            height: 5px;
            background-color: white;
            border-radius: 50%;
            box-shadow: 0 0 10px 2px white;
            animation: sparkle 3s infinite;
        }

        @keyframes sparkle {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 6rem;
            }

            h1 {
                font-size: 1.8rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="moon floating"></div>
    <div class="crystal-ball floating"></div>

    <div class="container">
        <div class="logo">Book of Shadows</div>
        <div class="error-code">404</div>
        <h1>A Página Que Você Busca Desapareceu no Vácuo</h1>
        <p>O grimório que você procura não pode ser encontrado. Talvez tenha sido movido para outro plano, ou talvez
            nunca tenha existido nesta dimensão.</p>

        <div class="cta-buttons">
            <a href="{{ route('home') }}" class="btn">Voltar ao Grimório Principal</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Explorar Outros Trabalhos</a>
        </div>
    </div>

    <script>
        // Adiciona efeitos de partículas brilhantes
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.querySelector('body');
            const sparkleCount = 15;

            for (let i = 0; i < sparkleCount; i++) {
                const sparkle = document.createElement('div');
                sparkle.classList.add('sparkle');

                // Posição aleatória
                const left = Math.random() * 100;
                const top = Math.random() * 100;
                sparkle.style.left = `${left}%`;
                sparkle.style.top = `${top}%`;

                // Tamanho aleatório
                const size = Math.random() * 4 + 2;
                sparkle.style.width = `${size}px`;
                sparkle.style.height = `${size}px`;

                // Atraso de animação aleatório
                sparkle.style.animationDelay = `${Math.random() * 5}s`;

                body.appendChild(sparkle);
            }
        });
    </script>
</body>

</html>
