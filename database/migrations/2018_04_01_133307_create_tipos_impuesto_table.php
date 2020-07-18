<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposImpuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_impuesto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('modulo_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('modulo_id')->references('modulo_id')->on('modulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_impuesto');
    }
}
