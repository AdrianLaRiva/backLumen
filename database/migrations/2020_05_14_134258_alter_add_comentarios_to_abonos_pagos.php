<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddComentariosToAbonosPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abonos_pagos', function (Blueprint $table) {
            $table->text('comentarios')->nullable()->after('fecha');             
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abonos_pagos', function (Blueprint $table) {
            $table->dropColumn(['comentarios']);
        });
    }
}