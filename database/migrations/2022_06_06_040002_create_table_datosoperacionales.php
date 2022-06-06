<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDatosoperacionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosoperacionales', function (Blueprint $table) {
            $table->id();
            $table->integer("totalhabitantes");
            $table->integer("totalpasajeros");
            $table->integer("totalflota");
            $table->integer("kilometrajediario");
            $table->integer("rpd");
            $table->integer("rpm");
            $table->integer("ipk");
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
        Schema::dropIfExists('datosoperacionales');
    }
}
