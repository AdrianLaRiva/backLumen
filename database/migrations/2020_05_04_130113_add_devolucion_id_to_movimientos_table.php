<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDevolucionIdToMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->integer('devolucion_id')->after('oc_id')->unsigned()->nullable();
            $table->foreign('devolucion_id')->references('id')->on('devolucioes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->dropForeign(['devolucion_id']);
            $table->dropColumn('devolucion_id');
        });
    }
}
