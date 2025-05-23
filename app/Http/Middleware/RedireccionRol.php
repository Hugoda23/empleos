<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedireccionRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $expectedRole  El nombre del rol esperado para esta ruta.
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $expectedRole)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $usuario = Auth::user();

        // Verifica que la relación rol esté cargada y exista
        if (!$usuario->rol) {
            return redirect('/login')->with('error', 'No tiene rol asignado.');
        }

        $userRoleName = $usuario->rol->nombre_rol;

        // Si el rol del usuario coincide con el rol esperado para esta ruta, permite el acceso
        if (strtolower($userRoleName) === strtolower($expectedRole)) {
            return $next($request);
        }

        // Si el rol no coincide, redirige al usuario a su dashboard correcto
        switch (strtolower($userRoleName)) {
            case 'administrador':
                return redirect()->route('admin.index');
            case 'reclutador':
                return redirect()->route('dashboard.empleos_publicados.index');
            case 'candidato':
                return redirect()->route('dashboard.empleos.index');
            default:
                // Si el rol no es reconocido, redirige al login
                return redirect('/login')->with('error', 'Rol no reconocido.');
        }
    }
}
