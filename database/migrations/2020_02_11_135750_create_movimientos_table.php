<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cotizacion_id')->unsigned()->nullable();
            $table->integer('oc_id')->unsigned()->nullable();
            $table->date('fecha_aprobacion');
            $table->integer('estado_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->integer("tipo_ingreso_egreso")->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete('cascade');
            $table->foreign('oc_id')->references('id')->on('ordenes_compra')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tipo_ingreso_egreso')->references('id')->on('tipo_ingreso_egreso')->onDelete('cascade');
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
        Schema::dropIfExists('movimientos');
    }
}
