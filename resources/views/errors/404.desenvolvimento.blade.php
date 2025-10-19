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

        /* Bruxinha Altamente Melhorada */
        .witch {
            position: absolute;
            width: 140px;
            height: 200px;
            z-index: 2;
            animation: fly 35s linear infinite;
            filter: drop-shadow(0 0 15px rgba(138, 43, 226, 0.7));
        }

        .witch-body {
            position: absolute;
            width: 55px;
            height: 75px;
            background: #2c0752;
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            top: 65px;
            left: 42px;
            z-index: 2;
            box-shadow: inset -5px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .witch-dress {
            position: absolute;
            width: 80px;
            height: 80px;
            background: linear-gradient(to bottom, #5d0e8b, #3a0755, #2a0540);
            border-radius: 50% 50% 0 0;
            top: 125px;
            left: 30px;
            clip-path: polygon(0% 0%, 100% 0%, 85% 100%, 15% 100%);
            z-index: 1;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }

        .witch-dress-folds {
            position: absolute;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.1) 20%, transparent 40%),
                linear-gradient(90deg, transparent 60%, rgba(255, 255, 255, 0.1) 80%, transparent 100%);
            border-radius: 50% 50% 0 0;
            clip-path: polygon(0% 0%, 100% 0%, 85% 100%, 15% 100%);
        }

        .witch-dress-details {
            position: absolute;
            width: 20px;
            height: 30px;
            background: #8a2be2;
            border-radius: 10px;
            top: 10px;
            left: 30px;
            box-shadow: 0 0 10px rgba(138, 43, 226, 0.5);
        }

        .witch-hat {
            position: absolute;
            width: 90px;
            height: 60px;
            background: linear-gradient(to bottom, #1a0a2a, #0a0515);
            border-radius: 50% 50% 0 0;
            top: 10px;
            left: 25px;
            clip-path: polygon(30% 0%, 70% 0%, 100% 100%, 0% 100%);
            z-index: 3;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
        }

        .witch-hat-brim {
            position: absolute;
            width: 110px;
            height: 25px;
            background: linear-gradient(to bottom, #1a0a2a, #0a0515);
            border-radius: 50%;
            top: 55px;
            left: 15px;
            z-index: 2;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
        }

        .witch-hat-star {
            position: absolute;
            width: 15px;
            height: 15px;
            background: gold;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            top: 25px;
            left: 62px;
            z-index: 4;
            animation: starTwinkle 2s infinite alternate;
        }

        @keyframes starTwinkle {
            0% {
                opacity: 0.3;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1.1);
            }
        }

        .witch-hair {
            position: absolute;
            width: 70px;
            height: 50px;
            background: linear-gradient(to bottom, #2c1810, #1a100a, #0f0805);
            border-radius: 50% 50% 0 0;
            top: 60px;
            left: 35px;
            z-index: 1;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        .witch-hair-strand {
            position: absolute;
            width: 25px;
            height: 40px;
            background: #1a100a;
            border-radius: 50%;
            top: 70px;
            left: 15px;
            transform: rotate(-20deg);
            z-index: 0;
        }

        .witch-hair-strand.right {
            left: 100px;
            transform: rotate(20deg);
        }

        .witch-face {
            position: absolute;
            width: 35px;
            height: 30px;
            background: #f5d6b5;
            border-radius: 50%;
            top: 75px;
            left: 52px;
            z-index: 2;
            box-shadow: inset -3px 3px 5px rgba(0, 0, 0, 0.1);
        }

        .witch-eye {
            position: absolute;
            width: 8px;
            height: 10px;
            background: #1a0a2a;
            border-radius: 50%;
            top: 82px;
            z-index: 3;
            animation: blink 4s infinite;
        }

        .witch-eye.left {
            left: 58px;
        }

        .witch-eye.right {
            left: 72px;
        }

        .witch-eye-sparkle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            top: 83px;
            left: 59px;
            z-index: 4;
            animation: sparkleTwinkle 1.5s infinite;
        }

        .witch-eye-sparkle.right {
            left: 73px;
        }

        .witch-nose {
            position: absolute;
            width: 6px;
            height: 8px;
            background: #e8b896;
            border-radius: 40%;
            top: 90px;
            left: 65px;
            z-index: 2;
            transform: rotate(10deg);
        }

        .witch-mouth {
            position: absolute;
            width: 15px;
            height: 6px;
            background: #8a2be2;
            border-radius: 0 0 10px 10px;
            top: 100px;
            left: 62px;
            z-index: 2;
            animation: smile 5s infinite alternate;
        }

        @keyframes smile {
            0% {
                height: 4px;
            }

            100% {
                height: 8px;
            }
        }

        .witch-arm {
            position: absolute;
            width: 45px;
            height: 10px;
            background: #f5d6b5;
            border-radius: 5px;
            top: 100px;
            left: 80px;
            transform: rotate(-15deg);
            z-index: 1;
            animation: armSwing 3s infinite alternate;
        }

        @keyframes armSwing {
            0% {
                transform: rotate(-15deg);
            }

            100% {
                transform: rotate(-25deg);
            }
        }

        .witch-hand {
            position: absolute;
            width: 14px;
            height: 14px;
            background: #f5d6b5;
            border-radius: 50%;
            top: 97px;
            left: 120px;
            z-index: 1;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .broom {
            position: absolute;
            width: 100px;
            height: 12px;
            background: linear-gradient(to right, #8B4513, #654321, #5d2f0a);
            border-radius: 6px;
            top: 135px;
            left: -70px;
            transform: rotate(15deg);
            z-index: 0;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .broom-straw {
            position: absolute;
            width: 60px;
            height: 30px;
            background: linear-gradient(to right, #daa520, #b8860b, #8b6914);
            border-radius: 15px 0 0 15px;
            top: 110px;
            left: -110px;
            clip-path: polygon(0% 0%, 100% 50%, 0% 100%);
            z-index: -1;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .broom-details {
            position: absolute;
            width: 10px;
            height: 12px;
            background: #654321;
            border-radius: 2px;
            top: 0;
            left: 30px;
            box-shadow:
                15px 0 0 #654321,
                30px 0 0 #654321,
                45px 0 0 #654321;
        }

        .magic-trail {
            position: absolute;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: radial-gradient(circle, #8a2be2, #5d0e8b);
            top: 90px;
            left: 125px;
            box-shadow: 0 0 20px 8px #8a2be2;
            animation: magicPulse 2s infinite, magicTrail 3s infinite;
            z-index: 0;
        }

        .magic-sparkle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 15px 3px white;
            animation: sparkleFly 2s infinite;
            z-index: 1;
        }

        .magic-star {
            position: absolute;
            width: 12px;
            height: 12px;
            background: gold;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            animation: starFloat 3s infinite;
            z-index: 1;
        }

        @keyframes magicPulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.7;
            }

            50% {
                transform: scale(1.4);
                opacity: 1;
            }
        }

        @keyframes magicTrail {
            0% {
                transform: translateX(0) translateY(0) scale(1);
                opacity: 0.8;
            }

            100% {
                transform: translateX(-40px) translateY(25px) scale(0.3);
                opacity: 0;
            }
        }

        @keyframes sparkleFly {
            0% {
                transform: translate(0, 0) scale(1);
                opacity: 1;
            }

            100% {
                transform: translate(50px, -50px) scale(0);
                opacity: 0;
            }
        }

        @keyframes starFloat {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.7;
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 1;
            }
        }

        @keyframes blink {

            0%,
            90%,
            100% {
                height: 10px;
            }

            95% {
                height: 2px;
            }
        }

        @keyframes sparkleTwinkle {

            0%,
            100% {
                opacity: 0.3;
            }

            50% {
                opacity: 1;
            }
        }

        @keyframes fly {
            0% {
                top: 20%;
                left: -140px;
                transform: rotate(5deg);
            }

            10% {
                top: 50%;
                transform: rotate(2deg);
            }

            20% {
                top: 15%;
                transform: rotate(-3deg);
            }

            30% {
                top: 60%;
                transform: rotate(4deg);
            }

            40% {
                top: 25%;
                transform: rotate(-1deg);
            }

            50% {
                top: 70%;
                left: 50%;
                transform: rotate(3deg);
            }

            60% {
                top: 30%;
                transform: rotate(-4deg);
            }

            70% {
                top: 65%;
                transform: rotate(1deg);
            }

            80% {
                top: 20%;
                transform: rotate(-2deg);
            }

            90% {
                top: 55%;
                transform: rotate(4deg);
            }

            100% {
                top: 25%;
                left: calc(100% + 140px);
                transform: rotate(5deg);
            }
        }

        @keyframes floatWitch {

            0%,
            100% {
                transform: translateY(0) rotate(0);
            }

            25% {
                transform: translateY(-10px) rotate(2deg);
            }

            50% {
                transform: translateY(-5px) rotate(0);
            }

            75% {
                transform: translateY(-15px) rotate(-2deg);
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

            .witch {
                transform: scale(0.7);
            }
        }
    </style>
</head>

<body>
    <div class="moon floating"></div>
    <div class="crystal-ball floating"></div>

    <!-- Bruxinha Altamente Melhorada -->
    <div class="witch">
        <div class="witch-hat">
            <div class="witch-hat-star"></div>
        </div>
        <div class="witch-hat-brim"></div>
        <div class="witch-hair">
            <div class="witch-hair-strand"></div>
            <div class="witch-hair-strand right"></div>
        </div>
        <div class="witch-body"></div>
        <div class="witch-dress">
            <div class="witch-dress-folds"></div>
            <div class="witch-dress-details"></div>
        </div>
        <div class="witch-face"></div>
        <div class="witch-eye left"></div>
        <div class="witch-eye right"></div>
        <div class="witch-eye-sparkle"></div>
        <div class="witch-eye-sparkle right"></div>
        <div class="witch-nose"></div>
        <div class="witch-mouth"></div>
        <div class="witch-arm"></div>
        <div class="witch-hand"></div>
        <div class="broom">
            <div class="broom-details"></div>
        </div>
        <div class="broom-straw"></div>
        <div class="magic-trail"></div>
    </div>

    <div class="container">
        <div class="logo">Book of Shadows</div>
        <div class="error-code">404</div>
        <h1>A Página Que Você Busca Desapareceu no Vácuo</h1>
        <p>O grimório que você procura não pode ser encontrado. Talvez tenha sido movido para outro plano, ou talvez
            nunca tenha existido nesta dimensão.</p>

        <div class="cta-buttons">
            <a href="https://github.com/Grazziano/book-of-shadows" class="btn">Voltar ao Grimório Principal</a>
            <a href="https://github.com/Grazziano" class="btn btn-secondary">Explorar Outros Trabalhos</a>
        </div>
    </div>

    <script>
        // Adiciona efeitos de partículas brilhantes
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.querySelector('body');
            const sparkleCount = 25;

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

            // Adiciona múltiplas bruxinhas em dispositivos maiores
            if (window.innerWidth > 768) {
                for (let i = 0; i < 2; i++) {
                    setTimeout(() => {
                        createWitch(i * 15); // Delay diferente para cada bruxinha
                    }, i * 10000);
                }
            }

            // Adiciona partículas mágicas que saem da bruxinha
            setInterval(() => {
                createMagicEffect();
            }, 800);
        });

        function createWitch(delay) {
            const witch = document.createElement('div');
            witch.className = 'witch';
            witch.style.animationDelay = `${delay}s`;

            // Posição inicial aleatória
            witch.style.top = `${Math.random() * 70 + 15}%`;

            const witchHTML = `
                <div class="witch-hat">
                    <div class="witch-hat-star"></div>
                </div>
                <div class="witch-hat-brim"></div>
                <div class="witch-hair">
                    <div class="witch-hair-strand"></div>
                    <div class="witch-hair-strand right"></div>
                </div>
                <div class="witch-body"></div>
                <div class="witch-dress">
                    <div class="witch-dress-folds"></div>
                    <div class="witch-dress-details"></div>
                </div>
                <div class="witch-face"></div>
                <div class="witch-eye left"></div>
                <div class="witch-eye right"></div>
                <div class="witch-eye-sparkle"></div>
                <div class="witch-eye-sparkle right"></div>
                <div class="witch-nose"></div>
                <div class="witch-mouth"></div>
                <div class="witch-arm"></div>
                <div class="witch-hand"></div>
                <div class="broom">
                    <div class="broom-details"></div>
                </div>
                <div class="broom-straw"></div>
                <div class="magic-trail"></div>
            `;

            witch.innerHTML = witchHTML;
            document.body.appendChild(witch);
        }

        function createMagicEffect() {
            const effects = ['sparkle', 'star'];
            const effectType = effects[Math.floor(Math.random() * effects.length)];

            const magicElement = document.createElement('div');
            magicElement.className = `magic-${effectType}`;

            // Posição aleatória próxima à bruxinha
            const witches = document.querySelectorAll('.witch');
            if (witches.length > 0) {
                const witch = witches[0];
                const witchRect = witch.getBoundingClientRect();

                const left = witchRect.left + Math.random() * 60;
                const top = witchRect.top + Math.random() * 60;

                magicElement.style.left = `${left}px`;
                magicElement.style.top = `${top}px`;

                // Atraso e duração aleatórios
                const delay = Math.random() * 1;
                const duration = 1 + Math.random() * 2;
                magicElement.style.animationDelay = `${delay}s`;
                magicElement.style.animationDuration = `${duration}s`;

                // Tamanho aleatório
                const size = 5 + Math.random() * 10;
                magicElement.style.width = `${size}px`;
                magicElement.style.height = `${size}px`;

                document.body.appendChild(magicElement);

                // Remove o elemento após a animação
                setTimeout(() => {
                    if (magicElement.parentNode) {
                        magicElement.parentNode.removeChild(magicElement);
                    }
                }, 3000);
            }
        }
    </script>
</body>

</html>
