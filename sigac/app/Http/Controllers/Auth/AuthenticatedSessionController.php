<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    public function createAluno()
    {
        return view('auth.login-aluno');
    }

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

    public function createAdmin()
    {
        return view('auth.login-admin');
    }

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
    public function store(\App\Http\Requests\Auth\LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user && $user->role === 'aluno') {
            return redirect()->route('painel.aluno');
        }
        if ($user && $user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        return redirect()->intended(\App\Providers\RouteServiceProvider::HOME);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
