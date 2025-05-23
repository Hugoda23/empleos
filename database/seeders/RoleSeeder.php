<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Limpiar las tablas antes de insertar datos
        DB::table('roles_permisos')->truncate();
        DB::table('permisos')->truncate();
        DB::table('roles')->truncate();

        // Crear roles usando la estructura existente de la base de datos
        $roles = [
            [
                'id_rol' => 1,
                'nombre_rol' => 'Administrador',
                'descripcion' => 'Control total del sistema',
                'fecha_crea' => now(),
            ],
            [
                'id_rol' => 2,
                'nombre_rol' => 'Reclutador',
                'descripcion' => 'Gestión de vacantes y postulaciones',
                'fecha_crea' => now(),
            ],
            [
                'id_rol' => 3,
                'nombre_rol' => 'Candidato',
                'descripcion' => 'Usuario que busca empleo',
                'fecha_crea' => now(),
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }

        // Crear permisos
        $permisos = [
            [
                'nombre_permiso' => 'gestionar_usuarios',
                'descripcion' => 'Gestionar usuarios del sistema',
                'fecha_crea' => now(),
            ],
            [
                'nombre_permiso' => 'ver_reportes',
                'descripcion' => 'Ver reportes del sistema',
                'fecha_crea' => now(),
            ],
            [
                'nombre_permiso' => 'crud_total',
                'descripcion' => 'Control total del sistema',
                'fecha_crea' => now(),
            ],
            [
                'nombre_permiso' => 'gestionar_vacantes',
                'descripcion' => 'Gestionar vacantes',
                'fecha_crea' => now(),
            ],
            [
                'nombre_permiso' => 'gestionar_postulaciones',
                'descripcion' => 'Gestionar postulaciones',
                'fecha_crea' => now(),
            ],
            [
                'nombre_permiso' => 'postular',
                'descripcion' => 'Postularse a vacantes',
                'fecha_crea' => now(),
            ],
            [
                'nombre_permiso' => 'ver_postulaciones',
                'descripcion' => 'Ver estado de postulaciones',
                'fecha_crea' => now(),
            ],
        ];

        foreach ($permisos as $permiso) {
            DB::table('permisos')->insert($permiso);
        }

        // Asignar permisos a roles usando la tabla roles_permisos
        $rolePermisos = [
            // Administrador - todos los permisos
            ['id_rol' => 1, 'id_permiso' => 1, 'fecha_crea' => now()],
            ['id_rol' => 1, 'id_permiso' => 2, 'fecha_crea' => now()],
            ['id_rol' => 1, 'id_permiso' => 3, 'fecha_crea' => now()],
            ['id_rol' => 1, 'id_permiso' => 4, 'fecha_crea' => now()],
            ['id_rol' => 1, 'id_permiso' => 5, 'fecha_crea' => now()],
            ['id_rol' => 1, 'id_permiso' => 6, 'fecha_crea' => now()],
            ['id_rol' => 1, 'id_permiso' => 7, 'fecha_crea' => now()],
            
            // Reclutador
            ['id_rol' => 2, 'id_permiso' => 4, 'fecha_crea' => now()], // gestionar_vacantes
            ['id_rol' => 2, 'id_permiso' => 5, 'fecha_crea' => now()], // gestionar_postulaciones
            
            // Candidato
            ['id_rol' => 3, 'id_permiso' => 6, 'fecha_crea' => now()], // postular
            ['id_rol' => 3, 'id_permiso' => 7, 'fecha_crea' => now()], // ver_postulaciones
        ];

        foreach ($rolePermisos as $rolPermiso) {
            DB::table('roles_permisos')->insert($rolPermiso);
        }
    }
}
