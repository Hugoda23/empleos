<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresasUsuariosController extends Controller
{
   public function index()
{

    $empresas = Empresa::withCount('vacantes')->get();

    return view('admin.empresas_usuarios.index', compact('empresas'));
}

public function show($id)
{
    $empresa = Empresa::with(['ubicacion', 'vacantes'])->findOrFail($id);
    return view('admin.empresas_usuarios.show', compact('empresa'));
}


}
