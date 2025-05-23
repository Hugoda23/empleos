<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Solicitud;

class NotificacionesEmpresaController extends Controller
{
    public function index()
    {
        $empresaId = Auth::user()->id_empresa; 

        $solicitudes = Solicitud::whereHas('vacante', function ($query) use ($empresaId) {
            $query->where('id_empresa', $empresaId);
        })->with('usuario', 'vacante')->latest()->get();

        return view('admin.notificaciones_empresas.index', compact('solicitudes'));
    }
}
