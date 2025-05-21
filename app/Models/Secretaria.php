<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Secretaria extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);//uno a muchos
    }
}