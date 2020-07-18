<?php

use Illuminate\Database\Seeder;

class ImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_impuesto')->insert([
            'nombre' => 'Afecta IVA',
            'modulo_id' =>'1'
     
        ]);
        DB::table('tipos_impuesto')->insert([
            'nombre' => 'No Afecta IVA',
            'modulo_id' =>'1'           
        ]);

        DB::table('tipos_impuesto')->insert([
            'nombre' => 'Afecta IVA',
            'modulo_id' =>'4'

        ]);
        DB::table('tipos_impuesto')->insert([
            'nombre' => 'No Afecta IVA',
            'modulo_id' =>'4'           
        ]);
        DB::table('tipos_impuesto')->insert([
            'nombre' => 'Boleta de Honorarios',
            'modulo_id' =>'4'
           
        ]);
    }
}
