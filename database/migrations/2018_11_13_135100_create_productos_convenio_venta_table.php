<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosConvenioVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_convenio_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->ugsined();
            $table->integer('convenio_venta_id')->unsigned();
            $table->float('descuento_porcentaje', 20, 2)->nullable();
            $table->float('descuento_pesos', 20, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['producto_id', 'convenio_venta_id']);
            $table->foreign('producto_id')->references('id')->on('prodcutos')->onDelete('cascade');
            $table->foreign('convenio_venta_id')->references('id')->on('convenios_veta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_convenio_venta');
    }
}
