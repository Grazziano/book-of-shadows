<x-app-layout>

    <x-slot name="header">
        <h2
            class="text-2xl md:text-3xl font-bold leading-tight text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-red-600">
            Perfil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div
                class="mb-4 rounded-lg p-8 bg-gradient-to-r from-gray-900 via-purple-900 to-black border border-purple-700/30 shadow-2xl">
                <div class="flex items-center gap-6">
                    <div
                        class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-600 to-red-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-xl font-semibold text-white">{{ auth()->user()->name ?? 'Usuário' }}</p>
                        <p class="text-sm text-gray-300">{{ auth()->user()->email ?? '' }}</p>
                        @if (auth()->user())
                            <p class="text-xs text-gray-400 mt-1">Membro desde
                                {{ auth()->user()->created_at->format('d/m/Y') }}</p>
                        @endif
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-red-600 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-red-700 transition-all duration-300">
                            ← Voltar ao Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="p-6 sm:p-8 bg-gradient-to-br from-gray-800 to-gray-900 border border-red-900/30 shadow-2xl rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div
                class="p-6 sm:p-8 bg-gradient-to-br from-gray-800 to-gray-900 border border-red-900/30 shadow-2xl rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div
                class="p-6 sm:p-8 bg-gradient-to-br from-gray-800 to-gray-900 border border-red-900/30 shadow-2xl rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
