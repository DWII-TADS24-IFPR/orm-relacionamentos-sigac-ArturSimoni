<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlunoDashboardController;
use App\Http\Controllers\CoordenadorDashboardController;
use App\Http\Controllers\EixoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role) { // Verifique se a role existe
            if ($user->role->nome === 'aluno') {
                return redirect()->route('aluno.dashboard');
            } elseif ($user->role->nome === 'coordenador') {
                return redirect()->route('coordenador.dashboard');
            }
        }
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:aluno'])->prefix('aluno')->name('aluno.')->group(function () {
    Route::get('/dashboard', [AlunoDashboardController::class, 'index'])->name('dashboard');
    Route::get('/documentos/create', [\App\Http\Controllers\DocumentoController::class, 'createAluno'])->name('documentos.create');
    Route::post('/documentos', [\App\Http\Controllers\DocumentoController::class, 'storeAluno'])->name('documentos.store');
    Route::get('/declaracao/pdf', [\App\Http\Controllers\AlunoDeclaracaoController::class, 'gerarDeclaracao'])->name('declaracao.pdf');
});

Route::middleware(['auth', 'verified', 'role:coordenador'])->prefix('coordenador')->name('coordenador.')->group(function () {
    Route::get('/dashboard', [CoordenadorDashboardController::class, 'index'])->name('dashboard');
    Route::resource('alunos', AlunoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('comprovantes', ComprovanteController::class);
    Route::resource('cursos', CursoController::class);

// Tive que adicionar o parameters pois o laravel estava puxando a URL 'Declaracoes/declaraco' em vez de 'Declaracoes/declaracao'
// Não sei o motivo disso ヽ(#`Д´)ﾉ
    Route::resource('declaracoes', DeclaracaoController::class)->parameters(['declaracoes' => 'declaracao']);

    Route::resource('documentos', DocumentoController::class);

// Aconteceu o mesmo com o Niveis, o laravel estava puxando a URL 'Niveis/nive' em vez de 'Niveis/nivel'
// Ainda não sei o motivo disso ヽ(#`Д´)ﾉ
    Route::resource('niveis', NivelController::class)->parameters(['niveis' => 'nivel']);

    Route::resource('turmas', TurmaController::class);
    Route::resource('eixos', EixoController::class);

    Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');
    Route::get('/turmas/get/{cursoId}', [AlunoController::class, 'getTurmasByCurso'])->name('turmas.byCurso');
    Route::post('documentos/{documento}/aprovar', [DocumentoController::class, 'aprovar'])->name('documentos.aprovar');
    Route::post('documentos/{documento}/reprovar', [DocumentoController::class, 'reprovar'])->name('documentos.reprovar');
    Route::get('turmas/{turma}/grafico-horas', [TurmaController::class, 'graficoHoras'])->name('turmas.grafico_horas');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
