<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListasPrecioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas_precio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('usuario_id')->unsigned();
            $table->date('fecha');
            $table->softDeletes();
            $table->timestamps();

            $table->unique('nombre');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas_precio');
    }
}
