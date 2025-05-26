<x-guest-layout>
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="card shadow-lg p-4" style="max-width: 420px; width: 100%;">
            <h2 class="text-center mb-4 fw-bold text-primary">Entrar no SIGAC</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="seu@email.com"
                        class="form-control"
                    />
                    <x-input-error :messages="$errors->get('email')" class="form-text text-danger" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Senha')" class="form-label" />
                    <x-text-input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="form-control"
                    />
                    <x-input-error :messages="$errors->get('password')" class="form-text text-danger" />
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="form-check-input"
                    />
                    <label for="remember_me" class="form-check-label">
                        {{ __('Lembrar-me') }}
                    </label>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-underline">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif

                    <x-primary-button class="btn btn-primary">
                        {{ __('Entrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
