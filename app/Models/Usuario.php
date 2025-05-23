<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    // Nombre de la tabla si no es 'usuarios'
    protected $table = 'usuarios';

    // Clave primaria personalizada
    protected $primaryKey = 'id_usuario';

    // Si no usas created_at y updated_at
    public $timestamps = false;

    // Campos asignables (ajusta según tu tabla)
    protected $fillable = [
        'nombre',
        'apellido',
        'correo_electronico',
        'contrasena',
        'telefono',
        'id_rol',
        'usuario_modifica',
        'fecha_registro',
        'fecha_modifica',
    ];


    public function getAuthPassword()
    {
        return $this->contrasena;
    }

   
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
    
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'id_usuario');
    }
}
