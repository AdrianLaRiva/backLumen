<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsOrdenCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_orden_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_compra_id')->unsigned();
            $table->string('nombre_producto');
            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->float('precio_unitario',20,2)->nullable();
            $table->float('descuento',20,2)->nullable();
            $table->float('total',20,2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('orden_compra_id')->references('id')->on('ordenes_compra')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_orden_compra');
    }
}
