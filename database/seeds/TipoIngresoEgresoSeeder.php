<?php

use Illuminate\Database\Seeder;

class TipoIngresoEgresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_ingreso_egreso')->insert([
            'nombre' => 'Egreso',
           
        ]);

        DB::table('tipo_ingreso_egreso')->insert([
            'nombre' => 'Ingreso',
           
        ]);

        DB::table('tipo_ingreso_egreso')->insert([
            'nombre' => 'Movimiento Interno',
           
        ]);

    }
}
