<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_asignatura', function (Blueprint $table) {
          $table->unsignedTinyInteger('id')->autoIncrement(); // también hace el campo Primary Key
          $table->string('nombre', 100);
          $table->string('nombre_corto', 15);
          $table->unsignedTinyInteger('semestre');
          $table->boolean('estatus');
          $table->string('clave', 20);
          $table->unsignedTinyInteger('orden');
          $table->boolean('promediar');
          $table->unsignedTinyInteger('num_creditos');
          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedTinyInteger('idplan');
          $table->foreign('idplan')->references('id')->on('c_planestudio');
          $table->unsignedTinyInteger('idescala');
          $table->foreign('idescala')->references('id')->on('c_escalaeval');
          $table->unsignedTinyInteger('idantecesor');
          $table->foreign('idantecesor')->references('id')->on('c_asignatura');
          // DB::statement("ALTER TABLE c_asignatura MODIFY archivo MEDIUMBLOB");
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
        Schema::dropIfExists('c_asignatura');
    }
}
