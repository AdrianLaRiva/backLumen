<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {

            $table->float('monto_cobrado', 20, 2)->nullable()->after('monto');
            $table->float('monto_diferido', 20, 2)->nullable()->after('monto_cobrado');
            $table->integer('estado_id')->unsigned()->nullable()->after('monto_diferido');

            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {

            $table->dropForeign('estado_id');
            $table->dropColumn(['monto_cobrado', 'monto_diferido', 'estado_id']);
        });
    }
}
