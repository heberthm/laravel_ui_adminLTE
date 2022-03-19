<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {

           
            $table->bigIncrements('id');
            $table->unsignedInteger('id_cliente')->required();
            $table->unsignedInteger('user_id')->required();
            $table->text('nombre',50)->required();
            $table->text('edad',3)->required();
            $table->text('sexo',10)->required();
            $table->text('especie',40)->required();
            $table->text('raza',40)->required();
            $table->text('caracteristicas',50);
            $table->text('color',20);
            $table->text('peso',3);
            $table->text('esterilizado',3);
            $table->text('foto',50);
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
        Schema::dropIfExists('mascotas');
    }
}
