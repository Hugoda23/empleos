<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Crear rol admin si no existe
        $rolAdmin = DB::table('roles')->where('id_rol', 1)->first();
        if (!$rolAdmin) {
            DB::table('roles')->insert([
                'id_rol' => 1,
                'nombre_rol' => 'admin',
                'descripcion' => 'Rol de administrador del sistema',
                'usuario_crea' => null,
                'fecha_crea' => now(),
                'usuario_modifica' => null,
                'fecha_modifica' => now(),
            ]);
        }

        // Crear usuario admin si no existe
        $usuarioAdmin = Usuario::where('correo_electronico', 'admin@demo.com')->first();
        if (!$usuarioAdmin) {
            Usuario::create([
                'nombre' => 'Admin',
                'apellido' => 'Demo',
                'correo_electronico' => 'admin@gmail.com',
                'contrasena' => Hash::make('12345678'),
                'telefono' => '1234567890',
                'id_rol' => 1,
                'fecha_registro' => now(),
            ]);
        }
    }
}
