<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\{
    AlunoController,
    CategoriaController,
    ComprovanteController,
    CursoController,
    DeclaracaoController,
    DocumentoController,
    NivelController,
    TurmaController,
    DashboardController,
    ProfileController
};

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas de login separadas para aluno e admin
Route::middleware('guest')->group(function () {
    // Login Aluno
    Route::get('/login/aluno', [AuthenticatedSessionController::class, 'createAluno'])->name('login.aluno');
    Route::post('/login/aluno', [AuthenticatedSessionController::class, 'storeAluno']);

    // Login Admin
    Route::get('/login/admin', [AuthenticatedSessionController::class, 'createAdmin'])->name('login.admin');
    Route::post('/login/admin', [AuthenticatedSessionController::class, 'storeAdmin']);

    // Registro customizado de aluno
    Route::get('/aluno/registrar', [AlunoController::class, 'showRegistroForm'])->name('aluno.registro');
    Route::post('/aluno/registrar', [AlunoController::class, 'registrar'])->name('aluno.registrar');
});

// ROTA AJAX PARA BUSCAR TURMAS POR CURSO (acessível para não autenticados)
Route::get('/turmas/get/{cursoId}', [AlunoController::class, 'getTurmasByCurso'])->name('turmas.byCurso');

// ROTA DE LOGOUT (deve estar fora dos grupos de middleware para funcionar em qualquer contexto autenticado)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rotas autenticadas
Route::middleware(['auth'])->group(function () {
    // Perfil do usuário
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Painel e funcionalidades do aluno (restrito ao papel aluno)
    Route::middleware('role:aluno')->prefix('aluno')->group(function () {
        Route::get('/painel', [AlunoController::class, 'painelAluno'])->name('painel.aluno');
        Route::get('/solicitar-horas', [AlunoController::class, 'solicitarHoras'])->name('aluno.solicitar_horas');
        Route::post('/solicitar-horas', [AlunoController::class, 'salvarSolicitacao'])->name('aluno.salvar_solicitacao');
        Route::get('/declaracao', [AlunoController::class, 'gerarDeclaracao'])->name('aluno.declaracao');
    });

    // Rotas administrativas (restrito ao papel admin)
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

        Route::resources([
            'alunos' => AlunoController::class,
            'categorias' => CategoriaController::class,
            'comprovantes' => ComprovanteController::class,
            'cursos' => CursoController::class,
            'declaracoes' => DeclaracaoController::class,
            'documentos' => DocumentoController::class,
            'niveis' => NivelController::class,
            'turmas' => TurmaController::class,
        ]);
    });
});
