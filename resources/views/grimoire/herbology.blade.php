<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herbologia Mágica • Grimório</title>
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
            <h1 class="section-title">Herbologia Mágica</h1>
            <p class="section-lead">Estudos de ervas, aromas e infusões para proteção, cura e harmonização energética.
                Observe contraindicações e respeite dosagens.</p>
            <div class="back-links">
                <a href="{{ route('grimoire.create') }}">Voltar ao início do Grimório</a>
                <a href="/">Home</a>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="grimoire-grid">
            <article class="grimoire-card">
                <h3>🌿 Alecrim</h3>
                <p>Purificação mental e foco. Usado em defumações e banhos energéticos para clareza.</p>
                <span class="tag">Uso: purificação • foco</span>
            </article>
            <article class="grimoire-card">
                <h3>🌸 Lavanda</h3>
                <p>Calmante e protetora. Traz serenidade ao ambiente e favorece o descanso.</p>
                <span class="tag">Uso: calma • proteção</span>
            </article>
            <article class="grimoire-card">
                <h3>🌿 Sálvia</h3>
                <p>Limpeza profunda de espaços e objetos. Ideal para encerrar ciclos e renovar.</p>
                <span class="tag">Uso: limpeza • renovação</span>
            </article>
            <article class="grimoire-card">
                <h3>🍃 Arruda</h3>
                <p>Proteção energética tradicional. Recomenda-se cuidado com pele sensível e animais.</p>
                <span class="tag">Uso: proteção • afastamento</span>
            </article>
            <article class="grimoire-card">
                <h3>🌼 Camomila</h3>
                <p>Tranquilidade e acolhimento. Boa para banhos relaxantes e ambientes de repouso.</p>
                <span class="tag">Uso: descanso • acolhimento</span>
            </article>
            <article class="grimoire-card">
                <h3>🌶️ Canela</h3>
                <p>Energia e prosperidade. Potencializa encantamentos de expansão e magnetismo pessoal.</p>
                <span class="tag">Uso: prosperidade • energia</span>
            </article>
        </div>
    </section>

    @include('components.footer')
</body>

</html>
