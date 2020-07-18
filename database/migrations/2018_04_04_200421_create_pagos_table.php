<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('monto',20,2)->nullable();
            $table->float('monto_porcentaje',20,2)->nullable();
            $table->date('fecha')->nullable();
            $table->integer('metodo_pago_id')->unsigned()->nullable();
            $table->integer('cobranza_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('cobranza_id')->references('id')->on('cobranzas')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pagos');
    }
}
