@extends('layouts.navigationaluno')

@section('content')
<div class="container">
    <h2>Declaração de Horas Complementares</h2>

    <p>Aluno: <strong>{{ $aluno->nome }}</strong></p>
    <p>Curso: <strong>{{ $aluno->curso->nome ?? 'Não informado' }}</strong></p>
    <p>Total de horas complementares aprovadas: <strong>{{ $totalHoras }} horas</strong></p>

    <p>Declaro que o aluno acima cumpriu as horas complementares conforme registros oficiais.</p>

    <a href="{{ route('painel.aluno') }}" class="btn btn-secondary">Voltar ao Painel</a>
</div>
@endsection
