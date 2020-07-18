<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevolucionesPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('monto')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->integer('metodo_pago_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->integer('devolucion_id')->unsigned();
            $table->string('comprobante')->nullable(); //url de adjunto
            $table->string('comprobante_original')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('metodo_pago_id')->references('id')->on('metodos_pago')->onDelete('cascade');
            $table->foreign('devolucion_id')->references('id')->on('devoluciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devoluciones_pagos');
    }
}
