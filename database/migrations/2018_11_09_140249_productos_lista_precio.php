<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductosListaPrecio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_listas_precio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->ugsined();
            $table->integer('lista_precio_id')->unsigned();
            $table->float('precio_venta_neto', 20, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['producto_id', 'lista_precio_id']);
            $table->foreign('producto_id')->references('id')->on('prodcutos')->onDelete('cascade');
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
        Schema::dropIfExists('productos_listas_precio');
    }
}
