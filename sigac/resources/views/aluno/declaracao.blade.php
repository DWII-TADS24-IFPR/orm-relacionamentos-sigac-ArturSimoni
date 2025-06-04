<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Declaração de Horas Aprovadas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Declaração de Horas Aprovadas</h2>
    <p>Aluno: <strong>{{ $aluno->nome }}</strong></p>
    <p>CPF: <strong>{{ $aluno->cpf }}</strong></p>
    <p>Curso: <strong>{{ $aluno->curso->nome ?? '-' }}</strong></p>
    <p>Turma: <strong>{{ $aluno->turma->ano ?? '-' }}</strong></p>
    <p>Data de emissão: <strong>{{ date('d/m/Y') }}</strong></p>
    <h3>Horas Aprovadas</h3>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Horas</th>
                <th>Documento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horasAprovadas as $hora)
                <tr>
                    <td>{{ $hora->documento->descricao ?? '-' }}</td>
                    <td>{{ $hora->horas }}</td>
                    <td>
                        @if($hora->documento && $hora->documento->url)
                            <a href="{{ asset('storage/' . $hora->documento->url) }}">PDF</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3 style="margin-top: 20px;">Total de Horas Aprovadas: <strong>{{ $totalHoras }}</strong></h3>
</body>
</html>
