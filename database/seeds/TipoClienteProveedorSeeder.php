<?php

use Illuminate\Database\Seeder;

class TipoClienteProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_cliente_proveedor')->insert([
            'nombre' => 'Cliente',
 
        ]);
        DB::table('tipos_cliente_proveedor')->insert([
            'nombre' => 'Proveedor',
 
        ]);
        DB::table('tipos_cliente_proveedor')->insert([
            'nombre' => 'Cliente y Proveedor',
 
        ]);
    }
}
