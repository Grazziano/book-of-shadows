<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comece sua Jornada - Grimório</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=EB+Garamond:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { background:#000; color:#a9a9a9; margin:0; font-family:'EB Garamond',serif; }
        .container { max-width: 1000px; margin: 0 auto; padding: 30px 20px; }
        .hero { background: linear-gradient(rgba(0,0,0,.8), rgba(26,10,31,.9)); border-bottom: 3px solid #8b0000; }
        .card { background: rgba(44,13,26,.8); border:1px solid #c45500; border-radius:8px; padding:24px; box-shadow:0 5px 15px rgba(0,0,0,.9); }
        h1 { font-family:'Creepster', cursive; color:#c45500; font-size:2.7rem; margin:0 0 12px; text-shadow:2px 2px 4px rgba(0,0,0,.9); }
        p.lead { font-size:1.2rem; margin-bottom:18px; }
        .actions { display:flex; gap:12px; flex-wrap:wrap; margin-top:12px; }
        .btn { display:inline-block; background:#8b0000; color:#a9a9a9; padding:10px 18px; border:1px solid #c45500; border-radius:4px; text-decoration:none; font-weight:600; letter-spacing:.5px; }
        .btn:hover { filter:brightness(1.1); transform:translateY(-2px); transition:.2s; }
        .grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:16px; margin-top:24px; }
        .grid a { text-decoration:none; color:inherit; }
        .grid h3 { color:#c45500; margin:0 0 8px; font-size:1.25rem; }
        .muted { color:#808080; font-size:.95rem; }
    </style>
</head>
<body>
@include('components.header')

<section class="hero">
    <div class="container">
        <div class="card">
            <h1>Comece sua Jornada</h1>
            <p class="lead">Prepare-se para registrar seus conhecimentos e explorar o Grimório.</p>
            <div class="actions">
                @guest
                    <a href="{{ route('register') }}" class="btn">Criar conta</a>
                    <a href="{{ route('login') }}" class="btn">Entrar</a>
                @else
                    <a href="{{ route('create-legend') }}" class="btn">Criar sua Lenda</a>
                    <a href="{{ route('dashboard') }}" class="btn">Ir para o Dashboard</a>
                @endguest
            </div>

            <div class="grid">
                <a href="{{ route('grimoire.spells') }}" class="card">
                    <h3>Feitiços Antigos</h3>
                    <p class="muted">Coleção de encantamentos e rituais de proteção, prosperidade e mais.</p>
                </a>
                <a href="{{ route('grimoire.rituals') }}" class="card">
                    <h3>Rituais Lunares</h3>
                    <p class="muted">Práticas alinhadas às fases da lua para potencializar intenções.</p>
                </a>
                <a href="{{ route('grimoire.herbology') }}" class="card">
                    <h3>Herbologia Mágica</h3>
                    <p class="muted">Propriedades e usos das ervas em trabalhos esotéricos.</p>
                </a>
            </div>
        </div>
    </div>
</section>

@include('components.footer')
</body>
</html>
