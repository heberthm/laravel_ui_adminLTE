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
            $table->text('vacuna_cachorros',5);
            $table->text('vacuna_polivalente',5);
            $table->text('vacuna_antirrabica',5);
            $table->text('disparasitacion_interna',5);
            $table->text('disparasitacion_externa',5);
            $table->text('otros',100);
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
            $table->text('receta',3);
            $table->text('recordatorio',3);
            $table->text('formulario',3);
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
