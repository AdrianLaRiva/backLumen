<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConvenioVentaListaPrecioToCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizaciones', function (Blueprint $table) {
            $table->integer('convenio_venta_id')->unsigned()->nullable();
            $table->integer('lista_precio_id')->unsigned()->nullable();
            $table->boolean('cotizacion_producto')->default(0);
            $table->foreign('convenio_venta_id')->references('id')->on('convenios_venta')->onDelete('cascade');
            $table->foreign('lista_precio_id')->references('id')->on('listas_precio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotizaciones', function (Blueprint $table) {
            $table->dropForeign(['convenio_venta_id']);
            $table->dropForeign(['lista_precio_id']);
            $table->dropColumn(array('convenio_venta_id', 'lista_precio_id', 'cotizacion_producto'));
        });
    }
}
