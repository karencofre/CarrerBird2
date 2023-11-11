<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_formacion')->nullable();
            $table->string('fecha_formacion')->nullable();
            $table->string('grado_formacion')->nullable();
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
        Schema::dropIfExists('formacions');
    }
}
