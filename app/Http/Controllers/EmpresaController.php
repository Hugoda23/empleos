<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Ubicacion;
use App\Models\Usuario; 
use App\Models\Notificacion;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    // Mostrar todas las empresas
    public function index()
    {
        $empresas = Empresa::all();
        return view('admin.empresas.index', compact('empresas'));
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        $ubicaciones = Ubicacion::all();
        $usuarios = Usuario::all();
        return view('admin.empresas.edit', compact('empresa', 'ubicaciones', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_empresa' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'sitio_web' => 'nullable|url|max:255',
            'id_ubicacion' => 'nullable|exists:ubicaciones,id_ubicacion',
            'id_usuario' => 'nullable|exists:usuarios,id_usuario',
        ]);

        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());

        return redirect()->route('admin.empresas.index')
            ->with('success', 'Empresa actualizada correctamente.');
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return redirect()->route('admin.empresas.index')
            ->with('success', 'Empresa eliminada correctamente.');
    }
    public function create()
{
    $ubicaciones = Ubicacion::all();
    $usuarios = Usuario::all();
    return view('admin.empresas.create', compact('ubicaciones', 'usuarios'));
}

public function store(Request $request)
{
    $request->validate([
        'nombre_empresa' => 'required|string|max:100',
        'descripcion' => 'nullable|string',
        'sitio_web' => 'nullable|url|max:255',
        'id_ubicacion' => 'nullable|exists:ubicaciones,id_ubicacion',
        'id_usuario' => 'nullable|exists:usuarios,id_usuario',
    ]);

    $empresa = Empresa::create($request->only([
        'nombre_empresa',
        'descripcion',
        'sitio_web',
        'id_ubicacion',
        'id_usuario',
    ]));

    $idUsuario = auth()->check() ? auth()->id() : null;

    Notificacion::create([
        'id_usuario' => $idUsuario,
        'tipo_notificacion' => 'empresa creada',
        'mensaje' => 'Se ha creado la empresa "' . $empresa->nombre_empresa . '"',
        'estado' => 'no leído',
        'fecha_creacion' => now(),
    ]);

    return redirect()->route('admin.empresas.index')
        ->with('success', 'Empresa creada correctamente y notificación enviada.');
}



}
