<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

Route::get('/aluno',[AlunoController::class, 'index'])->name('aluno.index');
Route::get('/', function () {
    return view('welcome');
});
