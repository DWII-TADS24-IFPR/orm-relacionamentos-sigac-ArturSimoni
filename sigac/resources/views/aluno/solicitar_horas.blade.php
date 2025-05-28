@extends('layouts.appaluno')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="mb-4 fw-bold text-center">Solicitar Horas Complementares</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('aluno.salvar_solicitacao') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" required>{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="carga_horaria" class="form-label">Carga Horária (horas)</label>
                            <input type="number" name="carga_horaria" id="carga_horaria" class="form-control @error('carga_horaria') is-invalid @enderror" required min="1" value="{{ old('carga_horaria') }}">
                            @error('carga_horaria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="arquivo" class="form-label">Arquivo (opcional)</label>
                            <input type="file" name="arquivo" id="arquivo" class="form-control @error('arquivo') is-invalid @enderror" accept=".pdf,.jpg,.png">
                            @error('arquivo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send"></i> Enviar Solicitação
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
