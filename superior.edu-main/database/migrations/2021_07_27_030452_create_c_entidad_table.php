<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCEntidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_entidad', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->unsignedTinyInteger('id')->autoIncrement(); // también hace el campo Primary Key
            $table->string('nombre', 100);

            $table->dateTime('fcreacion', $precision = 0);
            $table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_entidad');
    }
}
