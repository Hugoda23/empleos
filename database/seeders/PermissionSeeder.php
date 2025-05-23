<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            // Permisos de Administrador
            ['nombre_permiso' => 'gestionar_usuarios', 'descripcion' => 'Crear, editar y eliminar usuarios'],
            ['nombre_permiso' => 'gestionar_roles', 'descripcion' => 'Administrar roles y permisos'],
            ['nombre_permiso' => 'ver_reportes', 'descripcion' => 'Acceso a reportes del sistema'],
            
            // Permisos de Reclutador
            ['nombre_permiso' => 'gestionar_vacantes', 'descripcion' => 'Crear y editar vacantes'],
            ['nombre_permiso' => 'gestionar_postulaciones', 'descripcion' => 'Administrar postulaciones'],
            
            // Permisos de Candidato
            ['nombre_permiso' => 'postular_vacantes', 'descripcion' => 'Postularse a vacantes'],
            ['nombre_permiso' => 'ver_postulaciones', 'descripcion' => 'Ver estado de postulaciones'],
            ['nombre_permiso' => 'editar_perfil', 'descripcion' => 'Editar perfil personal'],
        ];

        foreach ($permisos as $permiso) {
            DB::table('permisos')->insert([
                'nombre_permiso' => $permiso['nombre_permiso'],
                'descripcion' => $permiso['descripcion'],
                'fecha_crea' => now(),
            ]);
        }
    }
}