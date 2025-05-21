<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\Event;
use App\Models\Historial;

class Doctor extends Model
{
    use HasFactory;

    // Primero las propiedades
    protected $fillable = [
        'nombre', 
        'apellidos', 
        'telefono', 
        'licencia_medica', 
        'especialidad', 
        'user_id'
    ];

    // Relaciones
public function user()
{
    return $this->belongsTo(User::class);
}


    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

     public function historial(){
        return $this->hasMany(Historial::class);
    }
}
