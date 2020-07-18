<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosOcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_oc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_compra_id')->unsigned();
            $table->float('monto',20,2)->nullable();
            $table->date('fecha')->nullable();
            $table->integer('metodo_pago_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('orden_compra_id')->references('id')->on('ordenes_compra')->onDelete('cascade');
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
        Schema::dropIfExists('pagos_oc');
    }
}
