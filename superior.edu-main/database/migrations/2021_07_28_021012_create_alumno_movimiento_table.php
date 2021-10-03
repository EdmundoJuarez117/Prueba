<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_movimiento', function (Blueprint $table) {
          $table->unsignedInteger('id')->autoIncrement(); // también hace el campo Primary Key
          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedInteger('idalumno');
          $table->foreign('idalumno')->references('id')->on('persona');

          $table->unsignedInteger('idusuario');
          $table->foreign('idusuario')->references('id')->on('persona');

          $table->unsignedTinyInteger('idmotivobaja');
          $table->foreign('idmotivobaja')->references('id')->on('c_motivobaja');

          $table->unsignedTinyInteger('idtipomovimiento');
          $table->foreign('idtipomovimiento')->references('id')->on('c_movimiento');
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
        Schema::dropIfExists('alumno_movimiento');
    }
}
