<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacante;
use App\Models\Notificacion;
use App\Models\Empresa;
use App\Models\CategoriaVacante;
use App\Models\Ubicacion;
class VacanteController extends Controller
{
    // Mostrar todas las vacantes
    public function index()
    {
        $vacantes = Vacante::with('empresa')->get();
        return view('admin.vacantes.index', compact('vacantes'));
    }

    // Mostrar solo vacantes publicadas

    // Mostrar formulario para crear nueva vacante
public function create()
{
    $empresas = Empresa::all();
    $categorias = CategoriaVacante::all();
    $ubicaciones = Ubicacion::all(); 

    return view('admin.empleos_publicados.create', compact('empresas', 'categorias', 'ubicaciones'));
}


    // Guardar nueva vacante y notificación
 public function store(Request $request)
{
    $request->validate([
        'titulo_puesto' => 'required|string|max:100',
        'descripcion_trabajo' => 'required|string',
        'requisitos' => 'nullable|string',
        'salario' => 'nullable|numeric',
        'estado' => 'required|in:activa,cerrada',
        'id_empresa' => 'nullable|exists:empresas,id_empresa',
        'id_categoria' => 'nullable|exists:categoria_vacantes,id_categoria',

    ]);

    $vacante = \App\Models\Vacante::create([
        'titulo_puesto' => $request->titulo_puesto,
        'descripcion_trabajo' => $request->descripcion_trabajo,
        'requisitos' => $request->requisitos,
        'salario' => $request->salario,
        'estado' => $request->estado,
        'id_empresa' => $request->id_empresa,
        'id_categoria' => $request->id_categoria,
    ]);

    return redirect()->route('admin.empleos_publicados.index')->with('success', 'Vacante publicada exitosamente.');
}



    // Mostrar formulario de edición
public function edit($id)
{
    $vacante = Vacante::findOrFail($id);
    $empresas = Empresa::all();
    $categorias = CategoriaVacante::all();
    $ubicaciones = Ubicacion::all();

    return view('admin.empleos_publicados.edit', compact('vacante', 'empresas', 'categorias', 'ubicaciones'));
}



    // Actualizar vacante existente
   public function update(Request $request, $id)
{
    $vacante = \App\Models\Vacante::findOrFail($id);

    $request->validate([
        'titulo_puesto' => 'required|string|max:100',
        'descripcion_trabajo' => 'required|string',
        'requisitos' => 'nullable|string',
        'salario' => 'nullable|numeric',
        'estado' => 'required|in:activa,cerrada',
        'id_empresa' => 'nullable|exists:empresas,id_empresa',
        'id_categoria' => 'nullable|exists:categoria_vacantes,id_categoria',
    ]);


   $vacante->update([
        'titulo_puesto' => $request->titulo_puesto,
        'descripcion_trabajo' => $request->descripcion_trabajo,
        'requisitos' => $request->requisitos,
        'salario' => $request->salario,
        'estado' => $request->estado,
        'id_empresa' => $request->id_empresa,
        'id_categoria' => $request->id_categoria,
        'usuario_modifica' => auth()->id(),
        'fecha_modifica' => now(),
    ]);
    return redirect()->route('admin.empleos_publicados.index')->with('success', 'Vacante actualizada correctamente.');
}


    // Eliminar vacante
    public function destroy($id)
    {
        $vacante = Vacante::findOrFail($id);
        $vacante->delete();

        return redirect()->route('admin.empleos_publicados.index')->with('success', 'Vacante eliminada correctamente.');
    }

    public function publicados()
{
    $vacantes = \App\Models\Vacante::with('empresa', 'categoria')
        ->where('estado', 'activa') // si ahora usas 'activa' y 'cerrada' en vez de 'publicado'
        ->get();

    return view('admin.empleos_publicados.index', compact('vacantes'));

}

}
