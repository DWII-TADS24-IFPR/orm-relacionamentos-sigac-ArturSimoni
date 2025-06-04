<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordenadorDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('coordenador.dashboard', compact('user'));
    }
}
