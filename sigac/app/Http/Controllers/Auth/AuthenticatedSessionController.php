<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // Exibe o formulário de login do aluno
    public function createAluno()
    {
        return view('auth.login-aluno');
    }

    // Processa o login do aluno
    public function storeAluno(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user && $user->role === 'aluno') {
            return redirect()->route('painel.aluno');
        }
        Auth::logout();
        return back()->withErrors(['email' => 'Acesso permitido apenas para alunos.']);
    }

    // Exibe o formulário de login do admin
    public function createAdmin()
    {
        return view('auth.login-admin');
    }

    // Processa o login do admin
    public function storeAdmin(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            return redirect()->route('dashboard');
        }
        Auth::logout();
        return back()->withErrors(['email' => 'Acesso permitido apenas para administradores.']);
    }

    // Método padrão de login (caso alguma rota use Auth padrão)
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user && $user->role === 'aluno') {
            return redirect()->route('painel.aluno');
        }
        if ($user && $user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        // Se não for aluno nem admin, faz logout e volta para login de aluno
        Auth::logout();
        return redirect()->route('login.aluno')->withErrors(['email' => 'Acesso não permitido.']);
    }

    // Logout
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
