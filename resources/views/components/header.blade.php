<style>
    .logo {
        cursor: pointer;
    }
</style>
<header>
    <div class="container header-content">
        <h1 class="logo flicker" onclick="window.location.href = '/';">Book of Shadows</h1>
        <nav>
            <ul>
                <!-- <li><a href="/">Início</a></li> -->
                <li><a href="{{ route('urban-legends') }}">Lendas Urbanas</a></li>
                <li><a href="{{ route('horror-stories') }}">Contos de Terror</a></li>
                <li><a href="{{ route('create-legend') }}">Crie sua Lenda</a></li>
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
                <button type="submit" class="btn btn-logout">Sair</button>
            </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-login">Login</a>
            <a href="{{ route('register') }}" class="btn btn-register">Registrar</a>
            @endif
        </div>
    </div>
</header>