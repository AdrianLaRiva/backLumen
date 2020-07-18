<?php

use Illuminate\Database\Seeder;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuraciones')->insert([
            'columnas_cliente_proveedor' => '[{"columna":"tipo cliente", "mostrar":"off"}, {"columna":"tipo empresa", "mostrar":"off"}]',
        ]);
    }
}
