<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('proyecto_id')->unsigned()->nullable();
            $table->json('json_data')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestores');
    }
}
