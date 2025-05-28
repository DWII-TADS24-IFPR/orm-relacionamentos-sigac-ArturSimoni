<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-lg">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('painel.aluno') }}">
            <i class="bi bi-mortarboard-fill"></i> SIGAC
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#alunoNavbar"
            aria-controls="alunoNavbar" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="alunoNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Painel do Aluno -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('painel.aluno') ? 'active fw-bold' : '' }}"
                        href="{{ route('painel.aluno') }}">
                        <i class="bi bi-house-door"></i> Painel
                    </a>
                </li>
                <!-- Solicitar Horas -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('aluno.solicitar_horas') ? 'active fw-bold' : '' }}"
                        href="{{ route('aluno.solicitar_horas') }}">
                        <i class="bi bi-plus-circle"></i> Solicitar Horas
                    </a>
                </li>
                <!-- Gerar Declaração -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('aluno.declaracao') ? 'active fw-bold' : '' }}"
                        href="{{ route('aluno.declaracao') }}">
                        <i class="bi bi-file-earmark-text"></i> Gerar Declaração
                    </a>
                </li>
            </ul>

            <!-- Usuário e Logout -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-2" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
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
