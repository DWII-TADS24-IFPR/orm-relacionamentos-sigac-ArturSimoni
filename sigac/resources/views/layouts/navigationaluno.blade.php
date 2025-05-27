<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-lg">
        <a class="navbar-brand fw-bold" href="{{ route('painel.aluno') }}">SIGAC</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#alunoNavbar" aria-controls="alunoNavbar" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="alunoNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Painel do Aluno -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('painel.aluno') ? 'active fw-bold' : '' }}" href="{{ route('painel.aluno') }}">Painel</a>
                </li>

                <!-- Solicitar Horas -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('aluno.solicitar_horas') ? 'active fw-bold' : '' }}" href="{{ route('aluno.solicitar_horas') }}">Solicitar Horas</a>
                </li>

                <!-- Gerar Declaração -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('aluno.declaracao') ? 'active fw-bold' : '' }}" href="{{ route('aluno.gerar_declaracao') }}">Gerar Declaração</a>
                </li>
            </ul>

            <!-- Usuário e Logout -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">Sair</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
