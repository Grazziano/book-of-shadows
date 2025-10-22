@extends('layouts.main')

@section('css-adicional')
    <link href="{{ asset('css/halloween-page.css') }}" rel="stylesheet">
@endsection

@section('content')
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
            <h2
                style="font-family: 'Butcherman', cursive; font-size: 2rem; color: var(--orange-glow); margin-bottom: 20px;">
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
@endsection
