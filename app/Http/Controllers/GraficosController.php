<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacante;
use App\Models\Empresa;

class GraficosController extends Controller
{
    public function index()
    {
        $vacantesPorEstado = Vacante::selectRaw('estado, COUNT(*) as cantidad')
            ->groupBy('estado')
            ->get();

        $empresas = Empresa::all();

        return view('admin.graficos.index', compact('vacantesPorEstado', 'empresas'));
    }
}
