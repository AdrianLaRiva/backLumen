<?php

use Illuminate\Database\Seeder;

class RegionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regiones')->insert([
            'nombre' => 'Tarapaca',
            'numero' => 1,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Antofagasta',
            'numero' => 2,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Atacama',
            'numero' => 3,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Coquimbo',
            'numero' => 4,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Valparaiso',
            'numero' => 5,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => "Libertador Gral. Bernardo O'higgins",
            'numero' => 6,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Maule',
            'numero' => 7,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'BioBio',
            'numero' => 8,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Araucania',
            'numero' => 9,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Los Lagos',
            'numero' => 10,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Aysén del Gral. Carlos Ibáñez del Campo',
            'numero' => 11,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Magallanes',
            'numero' => 12,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Metropolitana',
            'numero' => 13,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Los Ríos',
            'numero' => 14,
           
        ]);
        DB::table('regiones')->insert([
            'nombre' => 'Arica y Parinacota',
            'numero' => 15,
           
        ]);
    }
}
