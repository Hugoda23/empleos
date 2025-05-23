<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones'; // nombre de tu tabla

    protected $primaryKey = 'id_ubicacion';

    public $timestamps = false;

    protected $fillable = [
        // agrega aquí los campos de la tabla ubicaciones, ejemplo:
        'nombre',
        'direccion',
        // otros campos...
    ];
}
