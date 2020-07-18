<?php

use App\Models\Cotizacion;
use App\Models\ItemCotizacion;
use Illuminate\Database\Seeder;

class CotizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 40; $i++) {
            $impuesto     = 1;
            $iva          = '190.00';
            $neto         = '1000.00';
            $total_bruto  = '1190.00';
            $diferido     = '1190.00';
            $tipo_pago_id = 1;
            $fecha        = "2018-08-17";
            if ($i % 2 == 0) {
                /*
                $impuesto    = 5;
                $iva         = '100.00';
                $neto        = '1000.00';
                $total_bruto = '900.00';
                $diferido    = '1000.00';
                 */
                $tipo_pago_id = 3;
                $fecha        = "2018-09-17";
            }

            $orden = Cotizacion::create([
                'cliente_id'                  => '2523',
                'sucursal_id'                 => '1910',
                'subtotal'                    => '1000.00',
                'descuento_global_porcentaje' => '0.00',
                'descuento_global_CLP'        => '0.00',
                'total_neto'                  => $neto,
                'iva'                         => $iva,
                'total_bruto'                 => $total_bruto,
                'tipo_impuesto_id'            => $impuesto,
                'tipo_pago_id'                => $tipo_pago_id,
                'contacto_id'                 => '1910',
                'fecha'                       => $fecha,
                'estado_id'                   => '2',
                'usuario_id'                  => '1',
            ]);

            $item = ItemCotizacion::create([

                'cotizacion_id'   => $orden->id,
                'nombre_producto' => 'aa',
                'descripcion'     => 'a',
                'cantidad'        => '10',
                'precio_unitario' => '100',
                'descuento'       => '0',
                'total'           => '1000',
            ]);

        }

    }
}
