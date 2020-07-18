<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsOcProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_orden_compra_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_compra_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('unidad_id')->unsigned()->nullable();
            $table->string('descripcion', 255)->nullable();
            $table->integer('cantidad');
            $table->float('precio_unitario', 20, 2);
            $table->float('descuento_porcentaje', 20, 2)->nullable();
            $table->float('descuento_pesos', 20, 2)->nullable();
            $table->float('total', 20, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('orden_compra_id')->references('id')->on('ordenes_compra')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_oc_productos');
    }
}
