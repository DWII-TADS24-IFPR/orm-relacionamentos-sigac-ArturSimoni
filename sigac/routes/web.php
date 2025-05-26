<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
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

// Página inicial<?php

use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

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
