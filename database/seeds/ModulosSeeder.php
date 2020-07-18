<?php

use Illuminate\Database\Seeder;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulos')->insert([
            'nombre'    => 'Cotizaciones',
            'modulo_id' => 1,
            'estado'    => 1,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Clientes / Proveedores',
            'modulo_id' => 2,
            'estado'    => 1,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Cobranzas',
            'modulo_id' => 3,
            'estado'    => 1,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Ordenes de Compra',
            'modulo_id' => 4,
            'estado'    => 1,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Trabajadores',
            'modulo_id' => 5,
            'estado'    => 0,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Marketing Digital',
            'modulo_id' => 6,
            'estado'    => 0,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Tareas',
            'modulo_id' => 7,
            'estado'    => 0,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Productos',
            'modulo_id' => 8,
            'estado'    => 0,

        ]);

        DB::table('modulos')->insert([
            'nombre'    => 'Configuración',
            'modulo_id' => 9,
            'estado'    => 1,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Notificaciones',
            'modulo_id' => 10,
            'estado'    => 1,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Solicitud de Cotización',
            'modulo_id' => 11,
            'estado'    => 1,

        ]);
        DB::table('modulos')->insert([
            'nombre'    => 'Devoluciones',
            'modulo_id' => 12,
            'estado'    => 0,

        ]);

    }
}
