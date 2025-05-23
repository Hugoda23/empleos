<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaVacante extends Model
{
    protected $table = 'categoria_vacantes';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $fillable = [
        'nombre_categoria',
        'descripcion',
        'usuario_crea',
        'fecha_crea',
        'usuario_modifica',
        'fecha_modifica',
        'categoria_vacantes',
    ];
}
