<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedienteHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente_historico', function (Blueprint $table) {
          $table->unsignedInteger('id')->autoIncrement(); // también hace el campo Primary Key
          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedInteger('idgrupo');
          $table->foreign('idgrupo')->references('id')->on('grupo_historico');

          $table->unsignedInteger('idalumno');
          $table->foreign('idalumno')->references('id')->on('persona');

          $table->unsignedInteger('idusuario');
          $table->foreign('idusuario')->references('id')->on('persona');

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
        Schema::dropIfExists('expediente_historico');
    }
}
