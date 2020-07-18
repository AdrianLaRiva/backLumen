<?php

use Illuminate\Database\Seeder;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            'unidad'      => 'Kg',
            'descripcion' => 'Kilogramos',

        ]);

        DB::table('unidades')->insert([
            'unidad'      => 'Litros',
            'descripcion' => 'Litros',

        ]);

        DB::table('unidades')->insert([
            'unidad'      => 'Unidad',
            'descripcion' => 'Unidad',

        ]);
    }
}
