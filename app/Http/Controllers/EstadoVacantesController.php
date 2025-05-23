<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacante;
use Illuminate\Support\Facades\DB;

class EstadoVacantesController extends Controller
{
    public function index()
    {
        // Agrupamos por estado y contamos
        $datos = Vacante::select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get();

        return view('admin.estado_vacantes.index', compact('datos'));
    }
}
