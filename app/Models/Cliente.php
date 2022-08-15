<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
   

    protected $fillable = ['cedula','user_id','nombre','direccion','barrio', 'celular', 'email'];

    protected $id = 'id_cliente';
  
    public function mascota(){
        return $this->hasMany(mascota::class);
    }
    
   // use SoftDeletes;
   // use HasFactory;
}
