<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Muestra la lista de todas las solicitudes.
     */
    public function index()
    {
        $solicitudes = Solicitud::with('vacante', 'usuario')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    /**
     * Elimina una solicitud.
     */
    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('admin.solicitudes.index')
            ->with('success', 'Solicitud eliminada correctamente.');
    }

    /**
     * Envía un mensaje al postulante.
     */
    public function enviarMensaje(Request $request, $id)
    {
        $solicitud = Solicitud::with('usuario')->findOrFail($id);

        $request->validate([
            'mensaje' => 'required|string|max:1000',
        ]);

        // Aquí puedes enviar un correo o guardar el mensaje en base de datos
        // Por ahora, simulamos el envío con una notificación flash

        return redirect()->route('admin.solicitudes.index')
            ->with('success', 'Mensaje enviado a ' . $solicitud->usuario->nombre . ' correctamente.');
    }
}
