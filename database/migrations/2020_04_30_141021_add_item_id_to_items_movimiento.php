<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemIdToItemsMovimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items_movimiento', function (Blueprint $table) {
            $table->integer('item_id')->unsigned()->after('producto_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items_movimiento', function (Blueprint $table) {
            $table->dropColumn(['item_id']);
        });
    }
}
