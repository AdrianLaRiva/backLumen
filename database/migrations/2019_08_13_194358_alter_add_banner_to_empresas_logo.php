<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddBannerToEmpresasLogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {

            $table->string('url_banner')->after('url_logo_original')->nullable();
            $table->string('url_banner_original')->after('url_banner')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voidphp
     */
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) {

            $table->dropColumn(['url_banner', 'url_banner_original']);
        });
    }
}
