<?php

use Illuminate\Database\Seeder;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metodos_pago')->insert([
            'nombre' => 'Efectivo',
            
        ]);
        DB::table('metodos_pago')->insert([
            'nombre' => 'Transferencia Electronica',
            
        ]);
        DB::table('metodos_pago')->insert([
            'nombre' => 'Crédito',
            
        ]);
        DB::table('metodos_pago')->insert([
            'nombre' => 'Débito',
            
        ]);
        DB::table('metodos_pago')->insert([
            'nombre' => 'Cheque',
            
        ]);
        
        DB::table('metodos_pago')->insert([
            'nombre' => 'Devolución',
            
        ]);

    }
}
