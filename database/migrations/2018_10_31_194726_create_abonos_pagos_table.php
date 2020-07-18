<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonosPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pago_id')->unsigned();
            $table->float('monto', 20, 2);
            $table->date('fecha');
            $table->integer('metodo_pago_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade');
            $table->foreign('metodo_pago_id')->references('id')->on('metodos_pago')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos_pagos');
    }
}
