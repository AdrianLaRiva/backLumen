<?php

use Illuminate\Database\Seeder;

class TipoEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_empresa')->insert([
            'nombre' => 'Pequeña',
 
        ]);
        DB::table('tipos_empresa')->insert([
            'nombre' => 'Mediana',
 
        ]);
        DB::table('tipos_empresa')->insert([
            'nombre' => 'Grande',
 
        ]);
        DB::table('tipos_empresa')->insert([
            'nombre' => 'Retail',
 
        ]);
        DB::table('tipos_empresa')->insert([
            'nombre' => 'Tienda',
 
        ]);
    }
}
