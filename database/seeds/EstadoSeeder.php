<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'nombre'    => 'Aprobado',
            'modulo_id' => 1,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Pendiente',
            'modulo_id' => 1,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Rechazado',
            'modulo_id' => 1,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Pagado',
            'modulo_id' => 4,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Por Pagar',
            'modulo_id' => 4,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Por iniciar',
            'modulo_id' => 4,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Cotizacion Pendiente',
            'modulo_id' => null,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Agregar OC',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Por Facturar',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Por Cobrar',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Pagado',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Fallido',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Vigente',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'No Vigente',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Pago Anulado',
            'modulo_id' => null,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Por iniciar',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Activo',
            'modulo_id' => 3,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Por iniciar',
            'modulo_id' => 8,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Activo',
            'modulo_id' => 8,

        ]);

        DB::table('estados')->insert([
            'nombre'    => 'Completado',
            'modulo_id' => 8,

        ]);

    }
}
