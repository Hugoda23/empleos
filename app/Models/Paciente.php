<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles; 
use Spatie\Permission\Models\Permission;
use App\Models\Historial;


class Paciente extends Model
{
    use HasFactory, HasRoles; 
    protected $guard_name = 'web';

     public function historial(){
        return $this->hasMany(Historial::class);
    }

  
}
