<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $table = 'vacantes'; 

    protected $primaryKey = 'id_vacante';

protected $fillable = [
    'titulo_puesto',
    'descripcion_trabajo',
    'requisitos',
    'salario',
    'estado',
    'id_empresa',
    'id_categoria',
    'usuario_modifica',
    'fecha_modifica',
];



    // Relación con empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function categoria()
{
    return $this->belongsTo(\App\Models\CategoriaVacante::class, 'id_categoria', 'id_categoria');

}
public function ubicacion()
{
    return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
}



}
