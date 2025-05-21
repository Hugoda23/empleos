<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioAdminSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Admin',
            'apellido' => 'Demo',
            'correo_electronico' => 'admin@gmail.com',
            'contrasena' => bcrypt('12345678'),
            'telefono' => '1234567890',
            'id_rol' => 1,
        ]);
    }
}
