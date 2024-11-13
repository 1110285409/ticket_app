<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller {
    public function index(){

                // Obtener los datos que quieras compartir con todos los usuarios
                $data = User::all(); // Por ejemplo, si quieres mostrar una lista de usuarios

                // Verifica el rol del usuario
                if (auth()->user()->role == 'admin'){
                    return view('admin.index');
                }
    }
}
