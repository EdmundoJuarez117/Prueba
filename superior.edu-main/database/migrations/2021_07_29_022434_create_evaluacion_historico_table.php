<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_historico', function (Blueprint $table) {
          $table->unsignedBigInteger('id')->autoIncrement();
          $table->unsignedDecimal('calificacion', $precision = 2, $scale = 1); // 10.0. 9.9
          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedInteger('idexpediente');
          $table->foreign('idexpediente')->references('id')->on('expediente');

          $table->unsignedInteger('idusuario');
          $table->foreign('idusuario')->references('id')->on('persona');

          $table->unsignedTinyInteger('idasignatura');
          $table->foreign('idasignatura')->references('id')->on('c_asignatura');

          $table->unsignedTinyInteger('idperiodo');
          $table->foreign('idperiodo')->references('id')->on('c_periodo');
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
        Schema::dropIfExists('evaluacion_historico');
    }
}
