<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTasasimpuestos extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasasimpuestos', function (Blueprint $table) {
            $table->id();
            $table->integer("desinfeccion");
            $table->integer("canon");
            $table->integer("inspeccion");
            $table->integer("patentemunicipal");
            $table->integer("patentecomercial");
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
        Schema::dropIfExists('tasasimpuestos');
    }
}
