<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPagarToOrdenesDeCompraTable extends Migration
{
    public function up()
    {
        Schema::table('ordenes_compra', function (Blueprint $table) {

            $table->float('total_pagar', 20, 2)->nullable()->after('total_bruto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenes_compra', function (Blueprint $table) {

            $table->dropColumn(['total_pagar']);
        });
    }
}
