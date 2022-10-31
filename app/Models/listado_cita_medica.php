<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listado_cita_medica extends Model
{
       
    protected $fillable = ['user_id','id_mascota', 'nombre', 'mascota', 'especie', 'motivo_consulta'];

}
