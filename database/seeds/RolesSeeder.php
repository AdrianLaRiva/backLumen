<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre'      => 'Admin',
            'permisos'    => '{"1": ["1", "2", "3", "4", "5", "6", "7"], "2": ["1", "2", "3", "4"], "3": ["8", "7", "5", "6", "10", "11", "12", "9", "20", "21","22"], "4": ["1", "2", "3", "4", "5", "6", "8", "9", "10", "20", "21"], "9": ["13", "14", "15", "16", "17", "18", "19","23","27"], "10": ["7", "4", "3"]}',
            'descripcion' => "Acceso total",

        ]);

        DB::table('roles')->insert([
            'nombre'      => 'Proveedor',
            'permisos'    => '{"4":["4","5","9"]}',
            'descripcion' => "Acceso Ordenes de Compra",

        ]);

        DB::table('roles')->insert([
            'nombre'      => 'Cliente',
            'permisos'    => '{"1":["4","5"]}',
            'descripcion' => "Acceso Cotizaciones",

        ]);

        DB::table('roles')->insert([
            'nombre'      => 'Cliente y Proveedor',
            'permisos'    => '{"1":["4","5"],"4":["4","5","9"]}',
            'descripcion' => "Acceso Cotizaciones y Ordenes de Compra",

        ]);
    }
}
