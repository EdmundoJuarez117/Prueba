<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCLocalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_localidad', function (Blueprint $table) {
          $table->unsignedMediumInteger('id')->autoIncrement(); // también hace el campo Primary Key
          $table->string('nombre', 255);
          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedSmallInteger('idmunicipio');
          $table->foreign('idmunicipio')->references('id')->on('c_municipio');
          // $table->id();
          // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_localidad');
    }
}
