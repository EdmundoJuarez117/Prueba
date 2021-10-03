<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_movimiento', function (Blueprint $table) {
          $table->unsignedTinyInteger('id')->autoIncrement(); // también hace el campo Primary Key
          $table->string('nombre', 50);
          $table->boolean('estatus');

          $table->dateTime('fcreacion', $precision = 0);
          $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);

          $table->unsignedBigInteger('idrole');
          $table->foreign('idrole')->references('id')->on('roles');
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
        Schema::dropIfExists('c_movimiento');
    }
}
