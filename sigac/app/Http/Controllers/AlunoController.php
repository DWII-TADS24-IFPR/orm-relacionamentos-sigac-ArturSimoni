<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\User;
use App\Models\SolicitacaoHora;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class AlunoController extends Controller
{
    // Listagem (admin)
    public function index()
    {
        $alunos = Aluno::with(['curso', 'turma'])->get();
        return view('aluno.index', compact('alunos'));
    }

    // Criação de aluno (admin)
    public function create()
    {
        $cursos = Curso::all();
        $turmas = Turma::all();

        return view('aluno.create', compact('cursos', 'turmas'));
    }

    // Armazenar aluno (admin) — criando também o usuário relacionado
    public function store(AlunoRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['nome'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'] ?? $validated['senha']),
            'role' => 'aluno',
        ]);

        Aluno::create([
            'nome' => $validated['nome'],
            'cpf' => $validated['cpf'],
            'email' => $validated['email'],
            'curso_id' => $validated['curso_id'],
            'turma_id' => $validated['turma_id'],
            'user_id' => $user->id,
        ]);

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    // Registro público: Exibir formulário
    public function showRegistroForm()
    {
        $cursos = Curso::all();
        return view('aluno.registro', compact('cursos'));
    }

    // Registro público: Salvar aluno e criar usuário
    public function registrar(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:alunos,cpf',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|min:6|confirmed',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        $user = User::create([
            'name' => $validated['nome'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['senha']),
            'role' => 'aluno',
        ]);

        Aluno::create([
            'nome' => $validated['nome'],
            'cpf' => $validated['cpf'],
            'email' => $validated['email'],
            'curso_id' => $validated['curso_id'],
            'turma_id' => $validated['turma_id'],
            'user_id' => $user->id,
        ]);

        auth()->login($user);

        return redirect()->route('painel.aluno')->with('success', 'Registro realizado com sucesso!');
    }

    public function show(Aluno $aluno)
    {
        return view('aluno.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        $cursos = Curso::all();
        $turmas = Turma::all();

        return view('aluno.edit', compact('aluno', 'cursos', 'turmas'));
    }

    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $data = $request->validated();

        // Atualiza senha do usuário vinculado, se enviada
        if (!empty($data['senha'])) {
            $aluno->user->password = Hash::make($data['senha']);
            $aluno->user->save();
            unset($data['senha']);
        }

        $aluno->update($data);

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        // Excluir usuário vinculado também
        if ($aluno->user) {
            $aluno->user->delete();
        }

        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }

    // AJAX: retorna turmas de um curso
    public function getTurmasByCurso($cursoId)
    {
        $turmas = Turma::where('curso_id', $cursoId)->get(['id', 'ano']);
        return response()->json($turmas);
    }

    // Painel do aluno autenticado
    public function painelAluno()
    {
        $user = Auth::user();
        $aluno = $user->aluno;

        if (!$aluno) {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return redirect('/login/aluno')->with('error', 'Seu usuário não está vinculado a um aluno.');
        }

        $aluno->load('solicitacoesHoras');

        return view('aluno.painel', compact('aluno'));
    }

    public function solicitarHoras()
    {
        return view('aluno.solicitar_horas');
    }

    public function salvarSolicitacao(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string',
            'carga_horaria' => 'required|integer',
            'arquivo' => 'nullable|file|max:2048',
        ]);

        $arquivo = null;
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo')->store('documentos');
        }

        SolicitacaoHora::create([
            'aluno_id' => Auth::user()->aluno->id,
            'descricao' => $request->descricao,
            'carga_horaria' => $request->carga_horaria,
            'arquivo' => $arquivo,
            'status' => 'pendente',
        ]);

        return redirect()->route('painel.aluno')->with('success', 'Solicitação enviada com sucesso!');
    }

    public function gerarDeclaracao()
    {
        $aluno = Auth::user()->aluno;
        $totalHoras = $aluno->solicitacoesHoras()->where('status', 'aprovado')->sum('carga_horaria');

        $pdf = PDF::loadView('aluno.declaracao', [
            'aluno' => $aluno,
            'totalHoras' => $totalHoras
        ]);

        return $pdf->download('declaracao_complementar.pdf');
    }
}
