
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">SIGAC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coordenador.alunos.index') }}">Alunos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coordenador.categorias.index') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coordenador.comprovantes.index') }}">Comprovantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coordenador.cursos.index') }}">Cursos</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('coordenador.declaracoes.index') }}">Declarações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coordenador.documentos.index') }}">Documentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coordenador.niveis.index') }}">Niveis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coordenador.turmas.index') }}">Turmas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
