<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/aluno',[AlunoController::class,'aluno']
)->name('aluno');

route::get('/', function(){
    return view ('home', ['idade'=> 18],['frutas' =>['banana', 'maçã', 'limão']]);

})->name('home');


