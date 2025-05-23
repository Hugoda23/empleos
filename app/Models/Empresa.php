<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $primaryKey = 'id_empresa';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'nombre_empresa',
        'descripcion',
        'id_ubicacion',
        'sitio_web',
        'id_usuario',
        'estado',       
        'usuario_crea',
        'fecha_crea',
        'usuario_modifica',
        'fecha_modifica',
    ];

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion', 'id_ubicacion');
    }

    public function creador()
    {
        return $this->belongsTo(Usuario::class, 'usuario_crea', 'id_usuario');
    }

    public function modificador()
    {
        return $this->belongsTo(Usuario::class, 'usuario_modifica', 'id_usuario');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
    public function vacantes()
{
    return $this->hasMany(Vacante::class, 'id_empresa');
}

}
