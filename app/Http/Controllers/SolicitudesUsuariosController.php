<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudesUsuariosController extends Controller
{
public function index()
{
    $usuarioId = auth()->id(); // ID del usuario autenticado

    $solicitudes = Solicitud::with(['vacante.empresa'])
        ->where('id_usuario', $usuarioId)
        ->orderByDesc('created_at')
        ->get();

    return view('admin.solicitudes_usuarios.index', compact('solicitudes'));
}
}