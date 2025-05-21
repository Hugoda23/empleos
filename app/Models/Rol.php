<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    public $timestamps = false;

    protected $fillable = [
        'nombre_rol',
        'descripcion',
        'usuario_crea',
        'fecha_crea',
        'usuario_modifica',
        'fecha_modifica'
    ];

    // Relación con los usuarios que tienen este rol
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
}
