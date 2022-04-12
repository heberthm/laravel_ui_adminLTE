<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListadoCitaMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listado_cita_medicas', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->unsignedInteger('id_cliente')->required();
            $table->unsignedInteger('user_id')->required();
            $table->text('cliente',50)->required();
            $table->text('mascota',20)->required();
            $table->text('motivo_consulta',90)->required();
            $table->text('especie',40)->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listado_cita_medicas');
    }
}
