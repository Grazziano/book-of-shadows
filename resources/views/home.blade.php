@extends('layouts.main')

@section('content')
    <section class="hero">
        <div class="hero-content pulse">
            <h1 class="float">Seu Grimório Digital</h1>
            <p>Descubra os segredos ancestrais e registre sua jornada mágica neste Halloween</p>
            <a href="{{ route('grimoire.create') }}" class="btn">Comece sua Jornada</a>
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
                    <p>Aprenda rituais alinhados com as fases da lua para potencializar suas intenções e manifestações.
                    </p>
                </a>
                <a href="{{ route('grimoire.herbology') }}" class="feature-card">
                    <div class="feature-icon">🌿</div>
                    <h3>Herbologia Mágica</h3>
                    <p>Descubra as propriedades mágicas das ervas e como utilizá-las em seus trabalhos esotéricos.</p>
                </a>
            </div>
        </div>
    </section>
@endsection
