<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importar Auth
use App\Models\User;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        if (Auth::attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The password or email is incorrect, please try again'
            ]);
        }
        return redirect()->to('/home');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
