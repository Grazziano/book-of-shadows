<x-guest-layout>
    <div class="auth-title">
        <h1>Entrar no Grimório</h1>
        <p>Acesse seus conhecimentos sombrios</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="auth-status" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="form-error" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="form-error" />
        </div>

        <!-- Remember Me -->
        <div class="form-group">
            <label for="remember_me" class="checkbox-label">
                <input id="remember_me" type="checkbox" class="checkbox-input" name="remember">
                <span class="checkbox-custom"></span>
                <span class="checkbox-text">{{ __('Lembrar de mim') }}</span>
            </label>
        </div>

        <div class="form-actions">
            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif

            <x-primary-button class="auth-button">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>

        <div class="auth-footer">
            <p>Não possui uma conta? <a href="{{ route('register') }}" class="auth-link">Criar conta</a></p>
        </div>
    </form>
</x-guest-layout>
