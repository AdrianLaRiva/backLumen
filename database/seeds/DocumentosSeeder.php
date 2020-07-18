<?php

use Illuminate\Database\Seeder;

class DocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documentos')->insert([
            'nombre'    => 'clientesApolo',
            'modulo_id' => 2,

        ]);

        DB::table('documentos')->insert([
            'nombre'    => 'productosApolo',
            'modulo_id' => 8,

        ]);

    }
}
