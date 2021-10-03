<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo', function (Blueprint $table) {
          $table->unsignedInteger('id')->autoIncrement(); // también hace el campo Primary Key
          $table->string('nombre', 20);
          $table->unsignedTinyInteger('semestre');
          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedInteger('iddocente');
          $table->foreign('iddocente')->references('id')->on('persona');

          $table->unsignedInteger('idusuario');
          $table->foreign('idusuario')->references('id')->on('persona');
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
        Schema::dropIfExists('grupo');
    }
}
