<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
        <!-- Logo e título -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <span class="fw-bold text-primary">SIGAC</span>
        </a>

        <!-- Botão hamburger para menu responsivo -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links de navegação e dropdown -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menu principal -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('alunos.index') }}"
                        class="nav-link {{ request()->routeIs('alunos.*') ? 'active' : '' }}">
                        Alunos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categorias.index') }}"
                        class="nav-link {{ request()->routeIs('categorias.*') ? 'active' : '' }}">
                        Categorias
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('comprovantes.index') }}"
                        class="nav-link {{ request()->routeIs('comprovantes.*') ? 'active' : '' }}">
                        Comprovantes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cursos.index') }}"
                        class="nav-link {{ request()->routeIs('cursos.*') ? 'active' : '' }}">
                        Cursos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('declaracoes.index') }}"
                        class="nav-link {{ request()->routeIs('declaracoes.*') ? 'active' : '' }}">
                        Declarações
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('documentos.index') }}"
                        class="nav-link {{ request()->routeIs('documentos.*') ? 'active' : '' }}">
                        Documentos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('niveis.index') }}"
                        class="nav-link {{ request()->routeIs('niveis.*') ? 'active' : '' }}">
                        Níveis
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('turmas.index') }}"
                        class="nav-link {{ request()->routeIs('turmas.*') ? 'active' : '' }}">
                        Turmas
                    </a>
                </li>
            </ul>

            <!-- Dropdown usuário e logout -->
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
        </div>
    </div>
</nav>
