<?php

use Illuminate\Database\Seeder;

class AccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acciones')->insert(['nombre' => 'Crear']);
        DB::table('acciones')->insert(['nombre' => 'Editar']);
        DB::table('acciones')->insert(['nombre' => 'Eliminar']);
        DB::table('acciones')->insert(['nombre' => 'Vista rápida']);
        DB::table('acciones')->insert(['nombre' => 'Ver pdf']);
        DB::table('acciones')->insert(['nombre' => 'Enviar correo']);
        DB::table('acciones')->insert(['nombre' => 'Cambiar estado']);
        DB::table('acciones')->insert(['nombre' => 'Registrar pago']);
        DB::table('acciones')->insert(['nombre' => 'Ver pagos ']);
        DB::table('acciones')->insert(['nombre' => 'Ajuntar documento']);
        DB::table('acciones')->insert(['nombre' => 'Editar item (Periodica)']);
        DB::table('acciones')->insert(['nombre' => 'Cambiar fecha de pago']);
        DB::table('acciones')->insert(['nombre' => 'Usuarios']);
        DB::table('acciones')->insert(['nombre' => 'Cotizaciones']);
        DB::table('acciones')->insert(['nombre' => 'Ordenes de compra']);
        DB::table('acciones')->insert(['nombre' => 'Notificaciones']);
        DB::table('acciones')->insert(['nombre' => 'Clientes / proveedores']);
        DB::table('acciones')->insert(['nombre' => 'Perfil empresa']);
        DB::table('acciones')->insert(['nombre' => 'Roles']);
        DB::table('acciones')->insert(['nombre' => 'Eliminar documento']);
        DB::table('acciones')->insert(['nombre' => 'Restablecer pago']);
        DB::table('acciones')->insert(['nombre' => 'Anular pago']);
        DB::table('acciones')->insert(['nombre' => 'Importar/Exportar']);
        DB::table('acciones')->insert(['nombre' => 'Productos']);
        DB::table('acciones')->insert(['nombre' => 'Pago Proveedores']);
        DB::table('acciones')->insert(['nombre' => 'Solicitud Cotizaciones']);
        DB::table('acciones')->insert(['nombre' => 'Correos Electrónicos']);
        DB::table('acciones')->insert(['nombre' => 'Crear actividad']);
        DB::table('acciones')->insert(['nombre' => 'Editar actividad']);
        DB::table('acciones')->insert(['nombre' => 'Eliminar actividad']);
    }
}
