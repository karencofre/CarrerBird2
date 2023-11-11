<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabilidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_habilidad')->nullable();

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
        Schema::dropIfExists('habilidads');
    }
}
