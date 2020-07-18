<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDropUniqueClientesProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes_proveedores', function (Blueprint $table) {
            $table->dropUnique('clientes_proveedores_razon_social_unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes_proveedores', function (Blueprint $table) {
            $table->unique('razon_social');

        });
    }
}
