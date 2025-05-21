<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Doctor;
use App\Models\Consultorio;
use App\Models\Horario;

class Horario extends Model
{
    use HasFactory;

    // Primero las propiedades
    protected $fillable = [
        'dia', 
        'hora_inicio', 
        'hora_fin', 
        'doctor_id', 
        'consultorio_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function consultorio()
{
    return $this->belongsTo(Consultorio::class);
}

}
