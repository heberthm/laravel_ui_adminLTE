<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id_cliente');
            $table->string('cedula',18)->unique()->required();
            $table->string('user_id')->required();
            $table->string('nombre',60)->required();
            $table->string('direccion',150)->required();
            $table->string('barrio',60)->nullable();
            $table->string('celular',30)->nullable();
            $table->string('email',90)->unique()->required();
           // $table->foreignId('id_cliente')->constrained()->onDelete('cascade');
            //$table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('clientes');
    }
}
