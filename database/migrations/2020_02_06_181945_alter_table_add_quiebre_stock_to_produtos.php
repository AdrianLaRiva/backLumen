<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAddQuiebreStockToProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->integer('quiebre_stock')->nullable()->after('usuario_id');
            $table->boolean('caso_stock_cero')->nullable()->after('quiebre_stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['quiebre_stock']);
            $table->dropColumn(['caso_stock_cero']);
        });

    }
}
