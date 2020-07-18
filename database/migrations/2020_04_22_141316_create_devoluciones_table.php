<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevolucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->increments('id');
            $table->double('total',20,2)->nullable();
            $table->double('monto_pagado',20, 2)->nullable();
            $table->double('monto_diferido',20, 2)->nullable();
            $table->json('productos_data')->nullable();
            $table->json('pagos_data')->nullable();
            $table->integer('pago_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes_proveedores')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devoluciones');
    }
}
