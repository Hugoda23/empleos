<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'correo_electronico' => 'required|string|email|max:100|unique:usuarios',
            'contrasena' => 'required|string|min:8|confirmed',
            'tipo_usuario' => 'required|in:2,3', // 2 para reclutador, 3 para candidato
            'telefono' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo_electronico' => $request->correo_electronico,
            'contrasena' => Hash::make($request->contrasena),
            'id_rol' => $request->tipo_usuario,
            'telefono' => $request->telefono,
            'fecha_registro' => now(),
        ]);

        auth()->login($usuario);

        return redirect('/admin');
    }
}
