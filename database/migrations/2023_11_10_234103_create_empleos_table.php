<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cargo')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('renta')->nullable();
            $table->string('requisito')->nullable();
            $table->unsignedBigInteger('trabajador')->nullable();
            $table->foreign('trabajador')->references('id')->on('users')->onDelete('cascade');;
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleos');
    }
}
