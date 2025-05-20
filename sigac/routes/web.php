<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('alunos', \App\Http\Controllers\AlunoController::class);
Route::resource('categorias', \App\Http\Controllers\CategoriaController::class);
Route::resource('comprovantes', \App\Http\Controllers\ComprovanteController::class);
Route::resource('cursos', \App\Http\Controllers\CursoController::class);

Route::resource('declaracoes', \App\Http\Controllers\DeclaracaoController::class)->parameters(['declaracoes' => 'declaracao']);

Route::resource('documentos', \App\Http\Controllers\DocumentoController::class);

Route::resource('niveis', \App\Http\Controllers\NivelController::class);



Route::resource('turmas', \App\Http\Controllers\TurmaController::class);

Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');
Route::get('/turmas/get/{cursoId}', [AlunoController::class, 'getTurmasByCurso'])->name('turmas.byCurso');
