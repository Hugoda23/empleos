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
        $credentials = $request->validate([
            'correo_electronico' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'correo_electronico' => $credentials['correo_electronico'],
            'password' => $credentials['password']
        ])) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            $rol = $user->rol->nombre_rol;

            switch ($rol) {
                case 'Administrador':
                    return redirect()->route('admin.index');
                case 'Reclutador':
                    return redirect()->route('dashboard.empleos_publicados.index');
                case 'Candidato':
                    return redirect()->route('dashboard.empleos.index');
                default:
                    return redirect('/');
            }
        }

        return back()->withErrors([
            'correo_electronico' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}