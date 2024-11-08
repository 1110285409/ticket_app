<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function perfil()
    {
        $user = Auth::user();
        return view('perfil.perfil', compact('user'));
    }
}
