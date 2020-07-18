<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddGestorInicialToGestores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gestores', function (Blueprint $table) {
        $table->integer('gestor_inicial')->nullable()->after('json_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gestores', function (Blueprint $table) {
        $table->dropColumn(['gestor_inicial']);
        });
    }
}
