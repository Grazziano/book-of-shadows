<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feitiços Antigos • Grimório</title>
    <style>
        .hero {
            padding: 50px 0 20px;
            background: linear-gradient(180deg, var(--secondary-color), transparent);
        }

        .section-title {
            color: var(--accent-color);
            font-family: 'Creepster', cursive;
            font-size: 2.2rem;
            margin: 0 0 8px;
        }

        .section-lead {
            color: var(--text-color);
            max-width: 800px;
        }

        .grimoire-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            padding: 30px 0;
        }

        .grimoire-card {
            background: var(--secondary-color);
            border: 1px solid rgba(169, 169, 169, 0.2);
            border-radius: 6px;
            padding: 18px;
            box-shadow: 0 4px 12px var(--shadow-color);
            transition: transform .2s ease, filter .2s ease;
        }

        .grimoire-card:hover {
            transform: translateY(-2px);
            filter: brightness(1.05);
        }

        .grimoire-card h3 {
            margin: 0 0 8px;
            color: var(--text-color);
            font-size: 1.2rem;
        }

        .grimoire-card p {
            margin: 0;
            color: var(--text-color);
            font-size: .95rem;
        }

        .tag {
            display: inline-block;
            margin-top: 10px;
            font-size: .8rem;
            color: var(--accent-color);
        }

        .back-links {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .back-links a {
            color: var(--accent-color);
            text-decoration: underline;
        }
    </style>
</head>

<body>
    @include('components.header')

    <section class="hero">
        <div class="container">
            <h1 class="section-title">Feitiços Antigos</h1>
            <p class="section-lead">Coleção de encantamentos clássicos para proteção, visão e comunicação. Use com
                sabedoria e sempre com intenção clara.</p>
            <div class="back-links">
                <a href="{{ route('grimoire.create') }}">Voltar ao início do Grimório</a>
                <a href="/">Home</a>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="grimoire-grid">
            <article class="grimoire-card">
                <h3>✦ Luminae Umbrae</h3>
                <p>Revela caminhos ocultos ao projetar luz nas sombras. Ótimo para investigações noturnas.</p>
                <span class="tag">Intenção: clareza</span>
            </article>
            <article class="grimoire-card">
                <h3>✦ Velo Noctis</h3>
                <p>Manto de invisibilidade parcial em ambientes de baixa luz. Requer foco e silêncio.</p>
                <span class="tag">Intenção: discrição</span>
            </article>
            <article class="grimoire-card">
                <h3>✦ Vinculum Sal</h3>
                <p>Cria um círculo protetivo com sal consagrado. Afasta presenças indesejadas e vibrações densas.</p>
                <span class="tag">Intenção: proteção</span>
            </article>
            <article class="grimoire-card">
                <h3>✦ Murmúrios Ancestrais</h3>
                <p>Amplifica sonhos e memórias antigas para contato sutil com ancestrais benevolentes.</p>
                <span class="tag">Intenção: conexão</span>
            </article>
            <article class="grimoire-card">
                <h3>✦ Sussurro do Vento</h3>
                <p>Transporta mensagens curtas em correntes de ar próximas. Ideal para avisos discretos.</p>
                <span class="tag">Intenção: comunicação</span>
            </article>
            <article class="grimoire-card">
                <h3>✦ Chama Fria</h3>
                <p>Invoca uma chama azul de baixa temperatura para rituais simbólicos e purificações suaves.</p>
                <span class="tag">Intenção: purificação</span>
            </article>
        </div>
    </section>

    @include('components.footer')
</body>

</html>
