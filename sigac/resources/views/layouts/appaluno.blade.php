<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'SIGAC') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light text-dark">

    <div class="d-flex flex-column min-vh-100">

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container-lg">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('painel.aluno') }}">
                    <i class="bi bi-mortarboard-fill"></i> SIGAC
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('painel.aluno') ? 'active fw-bold' : '' }}" href="{{ route('painel.aluno') }}">
                                <i class="bi bi-house-door"></i> Painel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('aluno.solicitar_horas') ? 'active fw-bold' : '' }}" href="{{ route('aluno.solicitar_horas') }}">
                                <i class="bi bi-plus-circle"></i> Solicitar Horas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('aluno.declaracao') ? 'active fw-bold' : '' }}" href="{{ route('aluno.declaracao') }}">
                                <i class="bi bi-file-earmark-text"></i> Gerar Declaração
                            </a>
                        </li>
                    </ul>

                    {{-- Usuário autenticado --}}
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-2" href="#" id="userDropdown"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name ?? 'Usuário' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            <i class="bi bi-box-arrow-right"></i> Sair
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Cabeçalho da Página --}}
        @if (isset($header))
            <header class="bg-white shadow-sm border-bottom">
                <div class="container-lg py-3 px-3">
                    <h1 class="h3 fw-semibold text-primary">{{ $header }}</h1>
                </div>
            </header>
        @endif

        {{-- Conteúdo da Página --}}
        <main class="flex-grow-1 container-lg py-4 px-3">
            <div class="bg-white shadow rounded p-4">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
