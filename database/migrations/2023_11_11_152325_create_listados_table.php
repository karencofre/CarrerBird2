<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('puntuacion')->nullable();
            $table->unsignedBigInteger('trabajador')->nullable();
            $table->unsignedBigInteger('empleo')->nullable();
            $table->foreign('empleo')->references('id')->on('empleos')->onDelete('cascade');
            $table->foreign('trabajador')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listados');
    }
}
