<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas_medicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_mascota')->required();
            $table->unsignedInteger('user_id')->required();
            $table->text('descripcion',600);
            $table->text('examen_clinico',600);
            $table->text('pre_diagnostico',800);
            $table->text('examenes_complementarios',600);
            $table->text('diagnostico',600);
            $table->text('tratamiento',600);
            $table->text('medico_tratante',30);
            $table->text('profilaxis',60);
            $table->text('temperatura',3);
            $table->text('frecuencia_cardiaca',3);
            $table->text('frecuencia_respiratoria',3);
            $table->text('cc',3);
            $table->text('pcm',3);
            $table->text('trc',3);
            $table->text('condicion_dental',5);
            $table->text('condicion_oido',5);
            $table->text('nl',3);
            $table->text('pam',3);
            $table->text('receta',600);
            $table->text('recordatorio',600);
            $table->text('recordatorio_dias',3);
            $table->text('imagen',100);
            $table->text('formulario',500);
            $table->text('cirugia',3);

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
        Schema::dropIfExists('consultas_medicas');
    }
}
