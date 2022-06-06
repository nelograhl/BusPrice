<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->double("dolar");
            $table->integer("combustible");
            $table->integer("neumaticos");
            $table->integer("cubiertas");
            $table->integer("camaras");
            $table->integer("protectores");
            $table->integer("vidautil");
            $table->integer("recapado");
            $table->integer("norecap");
            $table->integer("chasis");
            $table->integer("carroceria");
            $table->integer("salariochofer");
            $table->integer("salariofiscal");
            $table->integer("salariojefe");
            $table->integer("segurop");
            $table->integer("segurov");
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
        Schema::dropIfExists('insumos');
    }
}
