<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'rut'             => 'rut_value',
            'razon_social'    => "razon_social_value",
            'nombre_fantasia' => 'nombre_fantasia_value',
            'direccion'       => 'direccion_value',
            'giro'            => 'giro_value',
            'telefono'        => 'telefono_value',
            'correo'          => 'correo_value',
            'comuna_id'       => 'comuna_id_value',
            'region_id'       => 'region_id_value',

        ]);
    }
}
