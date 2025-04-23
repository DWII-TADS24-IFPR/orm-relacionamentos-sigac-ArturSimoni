<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;
use Illuminate\Database\Eloquent\SoftDeletes;


class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aluno = Aluno::all();
        return view('aluno')->with('aluno',$aluno);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($request)
    {   

        Aluno::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha,
        ]);
        DB::table('alunos')->insert([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno, String $id)
    {
        $aluno = Aluno::find($id);

        if(isset($aluno)){
        $aluno->nome = $request->nome;
        $aluno->cpf = $request->cpf;
        $aluno->email = $request->email;
        $aluno->senha = $request->senha;

        $aluno->save();
        return redirect()-> route('alunos.index');
        }
        return '<h1>Não foi possivel atualizar</h1>';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno, String $id)
    {   
      $aluno = Aluno::find($id);
      if(isset($aluno)){
        $aluno->delete;
        return '<h1> Registro excluido </h1>';
      }
      return '<h1> Sem sucesso ao excluir </h1>';
    }
}