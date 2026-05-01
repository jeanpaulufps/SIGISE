<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Intento de login
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Redirección según rol
            $user = Auth::user();

            if ($user->role === 'super_admin') {
                return redirect()->route('dashboard.admin');
            }

            if ($user->role === 'entrenador') {
                return redirect()->route('dashboard.entrenador');
            }

            if ($user->role === 'secretaria') {
                return redirect()->route('dashboard.secretaria');
            }

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
