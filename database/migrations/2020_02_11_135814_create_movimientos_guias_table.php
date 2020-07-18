<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosGuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_guias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movimiento_id')->unsigned();
            $table->boolean('reversada')->nullable();
            $table->text("comentario")->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->date('fecha');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('movimiento_id')->references('id')->on('movimientos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos_guias');
    }
}
