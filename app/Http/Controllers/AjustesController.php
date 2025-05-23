<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AjustesController extends Controller
{
    public function index()
    {
        return view('admin.ajustes.index');
    }

     public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'correo' => 'required|email|unique:usuarios,correo_electronico,' . $user->id_usuario . ',id_usuario',
            'password_actual' => 'required',
            'nueva_password' => 'required|string|min:6|same:confirmar_password',
            'confirmar_password' => 'required',
        ]);

        if (!Hash::check($request->password_actual, $user->contrasena)) {
            return back()->with('error', 'La contraseña actual es incorrecta.');
        }

        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->correo_electronico = $request->correo;
        $user->contrasena = Hash::make($request->nueva_password);
        $user->save();

        return redirect()->route('admin.ajustes.index')->with('success', 'Datos actualizados correctamente.');
    }
}