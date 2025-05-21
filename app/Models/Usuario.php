<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nombre de la tabla personalizada
    protected $table = 'usuarios';

    // Clave primaria personalizada
    protected $primaryKey = 'id_usuario';

    // Laravel no usará automáticamente created_at ni updated_at
    public $timestamps = false;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'apellido',
        'correo_electronico',
        'contrasena',
        'telefono',
        'id_rol',
        'usuario_modifica',
        'fecha_modifica',
        'fecha_registro'
    ];

    // Oculta campos sensibles en respuestas JSON
    protected $hidden = [
        'contrasena',
    ];

    // Laravel utiliza este método para obtener el password
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    // Relación con roles (opcional)
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    // Relación con el usuario que modificó
    public function modificador()
    {
        return $this->belongsTo(Usuario::class, 'usuario_modifica');
    }
}
