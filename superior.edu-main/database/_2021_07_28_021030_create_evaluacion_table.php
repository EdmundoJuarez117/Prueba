<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion', function (Blueprint $table) {
          $table->unsignedBigInteger('id')->autoIncrement();
          $table->unsignedDecimal('calificacion', $precision = 2, $scale = 1); // 99,999.99
          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedInteger('idalumno');
          $table->foreign('idalumno')->references('id')->on('persona');

          $table->unsignedBigInteger('iduser');
          $table->foreign('iduser')->references('id')->on('users');

          $table->unsignedTinyInteger('idasignatura');
          $table->foreign('idasignatura')->references('id')->on('c_asignatura');

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
        Schema::dropIfExists('evaluacion');
    }
}
