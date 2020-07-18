<?php

use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_pago')->insert([
            'nombre' => 'Convenio De Pago',
           
        ]);

        DB::table('tipos_pago')->insert([
            'nombre' => 'Cuotas',
           
        ]);

        DB::table('tipos_pago')->insert([
            'nombre' => 'Periódico',
           
        ]);
    }
}
