<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacion;
use Carbon\Carbon;


class NotificacionController extends Controller
{
    public function index()
    {
        $notificaciones = Notificacion::all(); 

        return view('admin.notificaciones.index', compact('notificaciones'));
    }

    public function marcarLeida($id)
    {
        $notificacion = Notificacion::find($id);
        $notificacion->estado = 'leído';
        $notificacion->save();

        return redirect()->route('admin.notificaciones.index')
            ->with('success', 'Notificación marcada como leída.');
    }
}
