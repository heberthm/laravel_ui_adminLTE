<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultas_medicas extends Model
{
    use HasFactory;

    
    protected $fillable = ['user_id','id_mascota','descripcion','examen_clinico','pre_diagnostico','examenes_complementarios',
    'diagnostico','tratamiento','medico_tratante', 'vacuna_cachorros','vacuna_polivalente','vacuna_antirrabica','desparasitacion_interna',
    'desparasitacion_externa','otros','temperatura','frecuencia_cardiaca','frecuencia_respiratoria','cc','pcm','trc','condicion_dental',
    'condicion_oido','nl','pam','receta','recordatorio','formulario','cirugia'];
 
      public function mascota()
     {
         return $this->belongsTo(mascota::class);
     }
 

}
