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
        }else {
            if(auth()->user()->role == 'admin'){
                return redirect()-> route('admin.index');
            }else{
                return redirect()-> to('/');

            }
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
