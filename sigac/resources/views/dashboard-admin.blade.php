@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard do Administrador</h1>
    <div class="row">
        <!-- Usuários -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Usuários</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $usersCount ?? 0 }}</h5>
                    <p class="card-text">Total de usuários cadastrados.</p>
                    <a href="{{ route('alunos.index') }}" class="btn btn-light btn-sm">Gerenciar Usuários</a>
                </div>
            </div>
        </div>
        <!-- Cursos -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Cursos</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $coursesCount ?? 0 }}</h5>
                    <p class="card-text">Total de cursos disponíveis.</p>
                    <a href="{{ route('cursos.index') }}" class="btn btn-light btn-sm">Gerenciar Cursos</a>
                </div>
            </div>
        </div>
        <!-- Relatórios -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Relatórios</div>
                <div class="card-body">
                    <h5 class="card-title">Acessar</h5>
                    <p class="card-text">Visualize relatórios administrativos.</p>
                    <a href="{{ route('declaracoes.index') }}" class="btn btn-light btn-sm">Ver Relatórios</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Adicione mais cards ou gráficos conforme necessário -->
</div>
@endsection
