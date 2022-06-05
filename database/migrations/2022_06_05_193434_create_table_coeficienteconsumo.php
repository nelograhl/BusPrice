<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCoeficienteconsumo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coeficienteconsumo', function (Blueprint $table) {
            $table->id();
            $table->double("combustible");
            $table->double("lubricante");
            $table->double("neumaticos");
            $table->double("repuestos");
            $table->double("depreciacionvehiculo");
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
        Schema::dropIfExists('coeficienteconsumo');
    }
}
