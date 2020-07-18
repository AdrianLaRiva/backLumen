<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColmunasClienteProveedorToConfiguracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configuraciones', function($table)
        {
            $table->json('columnas_cliente_proveedor')->nullable()->after('condicion_orden_compra');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuraciones', function($table)
        {
            $table->dropColumn(array('columnas_cliente_proveedor'));
        });
    }
}
