<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;

class NotificacionesUsuariosController extends Controller
{
    public function index()
{
    $usuarioId = auth()->id(); // Usuario autenticado

    $notificaciones = Notificacion::where('id_usuario', $usuarioId)
        ->where('tipo_notificacion', 'mensaje')
        ->orderByDesc('fecha_creacion')
        ->get();

    return view('admin.notificaciones_usuarios.index', compact('notificaciones'));
}
}
