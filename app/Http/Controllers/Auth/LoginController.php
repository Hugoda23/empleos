<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo_electronico' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        $credentials = [
            'correo_electronico' => $request->correo_electronico,
            'password' => $request->contrasena, // aquí estaba el error
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return $this->redirectToRol();
        }

        return back()->withErrors([
            'correo_electronico' => 'Correo electrónico o contraseña incorrectos.',
        ])->onlyInput('correo_electronico');
    }

    protected function redirectToRol()
    {
        $rol = Auth::user()->rol;

        switch ($rol) {
            case 'admin':
                return redirect()->route('admin.index');
            case 'empresa':
                return redirect()->route('admin.empresas.index'); 
            case 'usuario':
            default:
                return redirect()->route('index'); 
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
