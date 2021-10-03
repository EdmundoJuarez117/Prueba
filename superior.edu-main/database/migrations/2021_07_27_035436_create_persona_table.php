<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
          $table->unsignedInteger('id')->autoIncrement(); // también hace el campo Primary Key
          $table->string('identificador', 50);
          $table->string('nombre', 50);
          $table->string('apellido1', 50);
          $table->string('apellido2', 50)->nullable($value = null);
          $table->char('sexo', 1);
          $table->string('curp', 18);
          $table->string('rfc', 13)->nullable($value = null);
          $table->string('num_tel', 20)->nullable($value = null);
          $table->string('num_cel', 20)->unique();
          $table->string('email', 100)->unique();
          $table->string('domicilio', 255)->nullable($value = null);
          $table->unsignedSmallInteger('idcolonia')->nullable($value = null);
          $table->string('colonia', 255)->nullable($value = null);

          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedTinyInteger('identidad');
          $table->foreign('identidad')->references('id')->on('c_entidad');

          $table->unsignedSmallInteger('idmunicipio');
          $table->foreign('idmunicipio')->references('id')->on('c_municipio');

          $table->unsignedBigInteger('idrole');
          $table->foreign('idrole')->references('id')->on('roles');

          $table->unsignedBigInteger('iduser');
          $table->foreign('iduser')->references('id')->on('users');

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
        Schema::dropIfExists('persona');
    }
}
