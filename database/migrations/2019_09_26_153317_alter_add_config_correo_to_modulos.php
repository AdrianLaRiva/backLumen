<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddConfigCorreoToModulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('modulos', function (Blueprint $table) {
            $table->boolean('config_correo')->after('estado')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('modulos', function (Blueprint $table) {

            $table->dropColumn(['config_correo']);
        });
    }
}
