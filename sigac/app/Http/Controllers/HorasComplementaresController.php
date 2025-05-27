<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHoraComplementarRequest;
use App\Models\HoraComplementar;
use App\Models\Aluno;
use Illuminate\Support\Facades\Auth;

class HorasComplementaresController extends Controller
{
    public function index()
    {
        $aluno = Aluno::where('user_id', Auth::id())->firstOrFail();
        $horas = $aluno->horasComplementares()->latest()->get();

        return view('horas.index', compact('horas'));
    }

    public function create()
    {
        return view('horas.create');
    }

    public function store(StoreHoraComplementarRequest $request)
    {
        $aluno = Aluno::where('user_id', Auth::id())->firstOrFail();

        $aluno->horasComplementares()->create($request->validated());

        return redirect()->route('horas.index')->with('success', 'Solicitação criada com sucesso!');
    }
}
