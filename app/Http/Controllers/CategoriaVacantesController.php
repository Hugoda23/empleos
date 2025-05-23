<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaVacante;

class CategoriaVacanteController extends Controller
{
    public function index()
    {
        $categorias = CategoriaVacante::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        CategoriaVacante::create([
            'nombre_categoria' => $request->nombre_categoria,
            'descripcion' => $request->descripcion,
            'usuario_crea' => auth()->id(),
        ]);

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    public function edit($id)
    {
        $categoria = CategoriaVacante::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = CategoriaVacante::findOrFail($id);
        $categoria->update([
            'nombre_categoria' => $request->nombre_categoria,
            'descripcion' => $request->descripcion,
            'usuario_modifica' => auth()->id(),
            'fecha_modifica' => now(),
        ]);

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy($id)
    {
        $categoria = CategoriaVacante::findOrFail($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
