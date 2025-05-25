<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AlunoController,
    CategoriaController,
    ComprovanteController,
    CursoController,
    DeclaracaoController,
    DocumentoController,
    NivelController,
    TurmaController,
    PainelController
};

// Página inicial


// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    Route::get('/painel', [PainelController::class, 'index'])->name('painel');

    // Recursos principais
    Route::resource('alunos', AlunoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('comprovantes', ComprovanteController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('declaracoes', DeclaracaoController::class)->parameters(['declaracoes' => 'declaracao']);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('niveis', NivelController::class);
    Route::resource('turmas', TurmaController::class);

    // Rotas específicas
    Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');
    Route::get('/turmas/get/{cursoId}', [AlunoController::class, 'getTurmasByCurso'])->name('turmas.byCurso');
});

// Arquivo de autenticação (Laravel Breeze, Jetstream, Fortify etc.)
require __DIR__ . '/auth.php';
