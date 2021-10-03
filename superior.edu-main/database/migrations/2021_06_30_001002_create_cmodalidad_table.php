<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmodalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_modalidad', function (Blueprint $table) {
						$table->unsignedTinyInteger('id')->autoIncrement(); // también hace el campo Primary Key
						$table->string('nombre', 100);
						$table->dateTime('fcreacion', $precision = 0);
						$table->dateTime('fmodificacion', $precision = 0)->nullable($value = true);
						// $table->id();
            // $table->timestamps(); // created_at Y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_modalidad');
    }
}
