<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $redirectPath = '/dashboard'; // Fallback

        if (Auth::check() && Auth::user()->role) { // Verifique se Auth::user()->role não é nulo
            $roleName = Auth::user()->role->nome;
            if ($roleName === 'aluno') {
                $redirectPath = route('aluno.dashboard');
            } elseif ($roleName === 'coordenador') {
                $redirectPath = route('coordenador.dashboard');
            }
        }

        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended($redirectPath);
    }
}
