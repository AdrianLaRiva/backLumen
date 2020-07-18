<?php

use Illuminate\Database\Seeder;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formas_pago')->insert([
            'nombre' => 'Total (100%)',
            'nro_cuotas' => 1
        ]);

        DB::table('formas_pago')->insert([
            'nombre' => '2 Cuotas (50% antes / 50% después)',
            'nro_cuotas' => 2
        ]);

        DB::table('formas_pago')->insert([
            'nombre' => '3 Cuotas',
            'nro_cuotas' => 3
           
        ]);
    }
}
