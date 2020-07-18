<?php

use Illuminate\Database\Seeder;

class AddAccionesModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acciones')->insert(['nombre' => 'Productos']);
        DB::table('modulo_acciones')->insert(['modulo_id' => 9, 'accion_id' => 24]);
        DB::table('modulo_acciones')->insert(['modulo_id' => 8, 'accion_id' => 1]);
        DB::table('modulo_acciones')->insert(['modulo_id' => 8, 'accion_id' => 2]);
        DB::table('modulo_acciones')->insert(['modulo_id' => 8, 'accion_id' => 3]);

    }
}
