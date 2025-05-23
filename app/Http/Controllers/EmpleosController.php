<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class EmpleosController extends Controller
{
    public function index()
    {
        // Cargar vacantes con su empresa y la ubicación de la empresa
        $empleos = Vacante::with(['empresa.ubicacion'])
            ->latest()
            ->get();

        return view('admin.empleos.index', compact('empleos'));
    }
    public function show($id)
{
    $empleo = Vacante::with(['empresa.ubicacion'])->findOrFail($id);
    return view('admin.empleos.show', compact('empleo'));
}

}
