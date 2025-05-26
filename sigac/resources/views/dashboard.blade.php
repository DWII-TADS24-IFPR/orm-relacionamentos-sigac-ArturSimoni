<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-2 text-dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5 bg-light min-vh-100">
        <div class="container max-w-4xl">
            <div class="card shadow-lg rounded">
                <div class="card-body p-4">
                    <h3 class="fs-4 fw-semibold text-dark mb-3">
                        {{ __("Olá, você está logado!") }}
                    </h3>
                    <p class="text-secondary lh-base">
                        Bem-vindo ao seu painel. Aqui você pode gerenciar suas configurações, verificar suas atividades recentes e acessar funcionalidades do sistema SIGAC.
                    </p>

                    <div class="row mt-4 g-3">
                        <div class="col-12 col-sm-6">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary w-100">
                                Editar Perfil
                            </a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a href="#" class="btn btn-success w-100">
                                Ver Relatórios
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
