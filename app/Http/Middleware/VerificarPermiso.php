<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificarPermiso
{
    public function handle(Request $request, Closure $next, $permiso)
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        $tienePermiso = DB::table('roles_permisos')
            ->join('permisos', 'roles_permisos.id_permiso', '=', 'permisos.id_permiso')
            ->where('roles_permisos.id_rol', auth()->user()->id_rol)
            ->where('permisos.nombre_permiso', $permiso)
            ->exists();

        if (!$tienePermiso) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}