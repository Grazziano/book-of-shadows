<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Creepster&family=EB+Garamond:wght@400;600&display=swap" rel="stylesheet">

<!-- Header CSS -->
<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<header>
    <div class="container header-content">
        <h1 class="logo flicker" onclick="window.location.href = '/';">Book of Shadows</h1>
        
        <!-- Menu Hambúrguer -->
        <button class="hamburger-menu" id="hamburger-menu" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <!-- Navegação Principal -->
        <nav class="main-nav" id="main-nav">
            <ul class="nav-links">
                <li><a href="{{ route('halloween.history') }}">História do Halloween</a></li>
                <li><a href="{{ route('urban-legends') }}">Lendas Urbanas</a></li>
                <li><a href="{{ route('horror-stories') }}">Contos de Terror</a></li>
                <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                @if(auth()->check())
                <li><a href="{{ route('create-legend') }}">Crie sua Lenda</a></li>
                @endif
                <li><a href="{{ route('macabre-newsletter') }}">Boletim Macabro</a></li>
                @if(auth()->check())
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif
            </ul>
        </nav>
        
        <div class="auth-buttons">
            @if(auth()->check())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout" onclick="return confirm('Tem certeza que deseja sair?');">Sair</button>
            </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-login">Login</a>
            <a href="{{ route('register') }}" class="btn btn-register">Registrar</a>
            @endif
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger-menu');
    const nav = document.getElementById('main-nav');
    
    hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('active');
        nav.classList.toggle('active');
    });
    
    // Fechar menu ao clicar em um link
    const navLinks = document.querySelectorAll('.nav-links a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            nav.classList.remove('active');
        });
    });
    
    // Fechar menu ao clicar fora
    document.addEventListener('click', function(event) {
        if (!hamburger.contains(event.target) && !nav.contains(event.target)) {
            hamburger.classList.remove('active');
            nav.classList.remove('active');
        }
    });
});
</script>