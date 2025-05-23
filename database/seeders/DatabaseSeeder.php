<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Rol; 
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    use App\Models\Rol;

public function run()
{
    if (!Rol::where('nombre_rol', 'admin')->exists()) {
        Rol::create([
            'nombre_rol' => 'admin',
            'descripcion' => 'Administrador del sistema',
            // campos necesarios
        ]);
    }
}

}
