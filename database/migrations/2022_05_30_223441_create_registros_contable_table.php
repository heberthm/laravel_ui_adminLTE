<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosContableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_contable', function (Blueprint $table) {
            $table->id();
            $table->text('saldo',12)->required();
            $table->text('ingreso',12)->required();
            $table->text('egreso',12)->required();
            $table->text('responsable',100)->required();
            $table->text('descripcion',250)->required();
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
        Schema::dropIfExists('registros_contable');
    }
}
