<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_egresos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guia_id')->unsigned()->nullable();
            $table->integer('producto_id')->unsigned();
            $table->integer('item_id')->nullable();
            $table->integer('bodega_id')->unsigned();
            $table->integer('seccion_id')->unsigned();
            $table->double('cantidad',20, 2);
            $table->integer('usuario_id')->unsigned();
            $table->date('fecha');
            $table->text('motivo')->nullable();
            $table->integer('bodega_id_destino')->unsigned()->nullable();
            $table->integer('seccion_id_destino')->unsigned()->nullable();
            $table->integer("tipo_ingreso_egreso")->unsigned();
            $table->foreign('tipo_ingreso_egreso')->references('id')->on('tipo_ingreso_egreso')->onDelete('cascade');
            $table->foreign('guia_id')->references('id')->on('movimientos_guias')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('seccion_id')->references('id')->on('secciones_bodegas')->onDelete('cascade');
            $table->foreign('bodega_id')->references('id')->on('bodegas')->onDelete('cascade');
            $table->foreign('seccion_id_destino')->references('id')->on('secciones_bodegas')->onDelete('cascade');
            $table->foreign('bodega_id_destino')->references('id')->on('bodegas')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seccion_id')->references('id')->on('secciones_bodegas')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos_egresos');
    }
}
