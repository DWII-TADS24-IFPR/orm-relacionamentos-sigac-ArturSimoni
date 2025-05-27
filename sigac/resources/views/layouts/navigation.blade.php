<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- Logo ou marca -->
    <a class="navbar-brand" href="{{ url('/') }}">SIGAC</a>

    <!-- Botão para mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Conteúdo colapsável -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Itens do menu principal -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="{{ route('turmas.index') }}"
             class="nav-link {{ request()->routeIs('turmas.*') ? 'active' : '' }}">
             Turmas
          </a>
        </li>
        <!-- Adicione mais links aqui se quiser -->
      </ul>

      <!-- Dropdown usuário e logout -->
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
