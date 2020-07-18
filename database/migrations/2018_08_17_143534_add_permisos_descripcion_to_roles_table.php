<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermisosDescripcionToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('roles', function($table)
        {
            $table->json('permisos')->nullable()->after('nombre');
            $table->text('descripcion')->nullable()->after('permisos');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function($table)
        {
            $table->dropColumn(array('permisos','descripcion'));
        });
    }
}
