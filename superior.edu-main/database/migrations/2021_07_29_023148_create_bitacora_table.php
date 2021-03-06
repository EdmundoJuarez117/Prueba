<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
          $table->unsignedBigInteger('id')->autoIncrement();
          $table->text('detalle');
          $table->dateTime('fcreacion', $precision = 0);

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
        Schema::dropIfExists('bitacora');
    }
}
