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

// Tive que adicionar o parameters pois o laravel estava puxando a URL 'Declaracoes/declaraco' em vez de 'Declaracoes/declaracao'
// Não sei o motivo disso ヽ(#`Д´)ﾉ
Route::resource('declaracoes', \App\Http\Controllers\DeclaracaoController::class)->parameters(['declaracoes' => 'declaracao']);

Route::resource('documentos', \App\Http\Controllers\DocumentoController::class);

// Aconteceu o mesmo com o Niveis, o laravel estava puxando a URL 'Niveis/nive' em vez de 'Niveis/nivel'
// Ainda não sei o motivo disso ヽ(#`Д´)ﾉ
Route::resource('niveis', \App\Http\Controllers\NivelController::class)->parameters(['niveis' => 'nivel']);

Route::resource('turmas', \App\Http\Controllers\TurmaController::class);

Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');
Route::get('/turmas/get/{cursoId}', [AlunoController::class, 'getTurmasByCurso'])->name('turmas.byCurso');
