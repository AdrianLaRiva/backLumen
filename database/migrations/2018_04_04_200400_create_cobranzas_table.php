<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobranzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobranzas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cotizacion_id')->unsigned();
            $table->float('monto',20,2)->nullable();
            $table->float('monto_pagado',20,2)->nullable();
            $table->string('orden_compra')->nullable(); //url de adjunto
            $table->string('orden_compra_original')->nullable();
            $table->string('factura')->nullable();//url de adjunto 
            $table->string('factura_original')->nullable();
            $table->text('comentarios')->nullable(); 
            $table->integer('nro_cuotas')->nullable();
            $table->integer('estado_id')->unsigned();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
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
        Schema::dropIfExists('cobranzas');
    }
}
