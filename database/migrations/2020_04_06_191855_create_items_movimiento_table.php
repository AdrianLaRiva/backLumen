<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_movimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movimiento_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->double('cantidad',20, 2);
            $table->double('cantidad_despachada',20, 2)->nullable();
            $table->double('cantidad_por_despachar',20, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('movimiento_id')->references('id')->on('movimientos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_movimiento');
    }
}
