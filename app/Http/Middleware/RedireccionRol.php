<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedireccionRol
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $usuario = Auth::user();

        // Verifica que la relación rol esté cargada y exista
        if (!$usuario->rol) {
            return redirect('/login')->with('error', 'No tiene rol asignado.');
        }

        $rol = strtolower($usuario->rol->nombre_rol);

        switch ($rol) {
            case 'admin':
                return redirect()->route('admin.index');
            case 'empleador':
                return redirect()->route('empleador.index');
            case 'postulante':
                return redirect()->route('postulante.index');
            default:
                return redirect('/login')->with('error', 'Rol no reconocido.');
        }

        
    }
}
