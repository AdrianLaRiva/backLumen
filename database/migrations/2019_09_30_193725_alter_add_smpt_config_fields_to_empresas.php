<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddSmptConfigFieldsToEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {

            $table->string('config_mail_host')->after('region_id')->nullable();
            $table->string('config_mail_puerto')->after('config_mail_host')->nullable();
            $table->string('config_mail_email')->after('config_mail_puerto')->nullable();
            $table->string('config_mail_clave')->after('config_mail_email')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn(['config_mail_host','config_mail_puerto','config_mail_email','config_mail_clave']);
    }
}
