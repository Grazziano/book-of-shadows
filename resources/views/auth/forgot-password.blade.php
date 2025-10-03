<x-guest-layout>
    <div class="auth-title">
        <h1>Recuperar Grimório</h1>
        <p>Recupere o acesso aos seus conhecimentos perdidos</p>
    </div>

    <div class="auth-description">
        {{ __('Esqueceu sua senha? Não há problema. Apenas nos informe seu endereço de email e enviaremos um link de redefinição de senha que permitirá escolher uma nova.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="auth-status" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="form-error" />
        </div>

        <div class="form-actions">
            <x-primary-button class="auth-button">
                {{ __('Enviar Link de Redefinição') }}
            </x-primary-button>
        </div>

        <div class="auth-footer">
            <p>Lembrou da senha? <a href="{{ route('login') }}" class="auth-link">Entrar</a></p>
        </div>
    </form>
</x-guest-layout>
