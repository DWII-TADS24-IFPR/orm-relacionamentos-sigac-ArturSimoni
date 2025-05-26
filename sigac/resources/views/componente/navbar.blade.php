<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <div class="container">
        <!-- Logo e título -->
        <a class="navbar-brand fw-bold text-primary" href="{{ route('alunos.index') }}">SIGAC</a>

        <!-- Botão responsivo -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Itens do menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Links principais -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('alunos.*') ? 'active fw-bold' : '' }}" href="{{ route('alunos.index') }}">Alunos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categorias.*') ? 'active fw-bold' : '' }}" href="{{ route('categorias.index') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('comprovantes.*') ? 'active fw-bold' : '' }}" href="{{ route('comprovantes.index') }}">Comprovantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('cursos.*') ? 'active fw-bold' : '' }}" href="{{ route('cursos.index') }}">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('declaracoes.*') ? 'active fw-bold' : '' }}" href="{{ route('declaracoes.index') }}">Declarações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('documentos.*') ? 'active fw-bold' : '' }}" href="{{ route('documentos.index') }}">Documentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('niveis.*') ? 'active fw-bold' : '' }}" href="{{ route('niveis.index') }}">Níveis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('turmas.*') ? 'active fw-bold' : '' }}" href="{{ route('turmas.index') }}">Turmas</a>
                </li>
            </ul>

            <!-- Menu usuário -->
            @auth
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-secondary" href="#" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Sair</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>
