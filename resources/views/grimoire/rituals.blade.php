<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rituais Lunares • Grimório</title>
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
            <h1 class="section-title">Rituais Lunares</h1>
            <p class="section-lead">Práticas alinhadas às fases da lua para consagração, manifestação e limpeza
                energética. Observe ciclos, horários e intenções.</p>
            <div class="back-links">
                <a href="{{ route('grimoire.create') }}">Voltar ao início do Grimório</a>
                <a href="/">Home</a>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="grimoire-grid">
            <article class="grimoire-card">
                <h3>🌑 Lua Nova</h3>
                <p>Ritual de renovação e plantar intenções. Use água, sal e vela preta para marcar o início.</p>
                <span class="tag">Foco: novos começos</span>
            </article>
            <article class="grimoire-card">
                <h3>🌒 Lua Crescente</h3>
                <p>Fortalecimento de projetos e energia vital. Incensos de alecrim e canela são bem-vindos.</p>
                <span class="tag">Foco: crescimento</span>
            </article>
            <article class="grimoire-card">
                <h3>🌓 Quarto Crescente</h3>
                <p>Ajuste de rotas e foco disciplinado. Banhos de ervas leves ajudam a clarificar metas.</p>
                <span class="tag">Foco: ajustes</span>
            </article>
            <article class="grimoire-card">
                <h3>🌕 Lua Cheia</h3>
                <p>Ritual de consagração e manifestação. Utilize água lunar, cristais e oração de gratidão.</p>
                <span class="tag">Foco: expansão</span>
            </article>
            <article class="grimoire-card">
                <h3>🌗 Quarto Minguante</h3>
                <p>Liberação de padrões e limpeza de espaços. Defumações e sal grosso potencializam o processo.</p>
                <span class="tag">Foco: desapego</span>
            </article>
            <article class="grimoire-card">
                <h3>🌘 Lua Minguante</h3>
                <p>Encerramentos e repouso energético. Recolha instrumentos e agradeça aos guardiões.</p>
                <span class="tag">Foco: encerramento</span>
            </article>
        </div>
    </section>

    @include('components.footer')
</body>

</html>
