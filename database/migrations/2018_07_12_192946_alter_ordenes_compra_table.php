<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrdenesCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes_compra', function (Blueprint $table) {

            $table->float('monto_pagado', 20, 2)->nullable()->after('total_bruto');
            $table->float('monto_diferido', 20, 2)->nullable()->after('monto_pagado');
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

            $table->dropColumn(['monto_pagado', 'monto_diferido']);
        });
    }
}
