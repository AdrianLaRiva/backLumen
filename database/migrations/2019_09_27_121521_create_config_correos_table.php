<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigCorreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_correos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('asunto')->nullable();
            $table->text('mensaje')->nullable();
            $table->integer('modulo_id')->unsigned()->nullable(); 
            $table->timestamps();
            $table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_correos');
    }
}
