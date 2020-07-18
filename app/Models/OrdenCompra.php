<?php

namespace App\Models;

use App\Utils;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenCompra extends Model
{

    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['items', 'pagos', 'itemsProducto', 'movimiento'];

    protected $table = 'ordenes_compra';

    protected $dates = ['deleted_at'];

    protected $fillable = ['cliente_id',
        'sucursal_id',
        'cotizacion_id',
        'usuario_id',
        'subtotal',
        'descuento_global_porcentaje',
        'descuento_global_CLP',
        'tipo_impuesto_id',
        'total_neto',
        'iva',
        'total_bruto',
        'total_pagar',
        'estado_id',
        'tipo_oc_id',
        'fecha',
        'campos_personalizados',
        'condicion',
        'contacto_id',
        'monto_pagado',
        'monto_diferido',
        'comprobante',
        'comprobante_original',
        'oc_producto',
        'factura_boleta',
        'factura_boleta_original',
    ];

    public function clienteProveedor()
    {

        return $this->belongsTo('App\Models\ClienteProveedor', 'cliente_id', 'id');
    }

    public function estado()
    {

        return $this->belongsTo('App\Models\Estado', 'estado_id', 'id');
    }

    public function items()
    {

        return $this->hasMany('App\Models\ItemOrdenCompra', 'orden_compra_id', 'id');
    }

    public function itemsProducto()
    {

        return $this->hasMany('App\Models\ItemOrdenCompraProducto', 'orden_compra_id', 'id');
    }

    public function sucursal()
    {

        return $this->belongsTo('App\Models\Sucursal');

    }

    public function movimiento()
    {
        return $this->hasOne('App\Models\Movimiento', 'oc_id', 'id');
    }


    public function tipoOrdenCompra()
    {
        return $this->belongsTo('App\Models\TipoOrdenCompra', 'tipo_oc_id', 'id');

    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'usuario_id', 'id');
    }

    public function contacto()
    {
        return $this->belongsTo('App\Models\ContactoClienteProveedor', 'contacto_id', 'id');
    }

    public function tipoImpuesto()
    {
        return $this->belongsTo('App\Models\TipoImpuesto', 'tipo_impuesto_id', 'id');

    }

    public function pagos()
    {
        return $this->hasMany('App\Models\PagoOC', 'orden_compra_id', 'id');
    }

    public function makeDataEdit($order)
    {
        $order->subtotal                    = Utils::inverseFormat($order->subtotal);
        $order->descuento_global_porcentaje = Utils::inverseFormat($order->descuento_global_porcentaje);
        $order->descuento_global_CLP        = Utils::inverseFormat($order->descuento_global_CLP);
        $order->total_neto                  = Utils::inverseFormat($order->total_neto);
        $order->iva                         = Utils::inverseFormat($order->iva);
        $order->total_bruto                 = Utils::inverseFormat($order->total_bruto);
        $order->fecha                       = \DateTime::createFromFormat('Y-m-d', $order->fecha);
        $order->fecha                       = $order->fecha->format('d/m/Y');

        foreach ($order->items as $key => $value) {

            $value->descuento_pesos = Utils::inverseFormat($value->descuento_pesos);
            $value->precio_unitario = Utils::inverseFormat($value->precio_unitario);
            $value->total           = Utils::inverseFormat($value->total)      ;  
        }

        foreach ($order->itemsProducto as $key => $value) {

            $value->descuento_pesos = Utils::inverseFormat($value->descuento_pesos);
            $value->precio_unitario = Utils::inverseFormat($value->precio_unitario);
            $value->total           = Utils::inverseFormat($value->total);
            $value->cantidad        = Utils::inverseFormatComas($value->cantidad);

            $value->data_decimales   = 0;
            if($value->producto->unidad)
            {
                $value->data_decimales = $value->producto->unidad->decimales;    
            } 
        }

        $additional_field = Utils::additional_field("campos_orden_compra");

        if ($additional_field) {
            $order->campos_personalizados = json_decode($order->campos_personalizados);
            $aux                          = $additional_field["id"];
            if (isset($order->campos_personalizados->$aux)) {
                if ($order->campos_personalizados->$aux) {
                    $order->additional_field = $order->campos_personalizados->$aux;
                }
            }
        }

        return $order;

    }


    public function isProductOc()
    {
        if (!$this->oc_producto) {
            return false;
        }
        return true;
    }

    public function setOrdenPorIniciar()
    {
        $this->estado_id  = 6;
        $this->usuario_id = \Auth::user()->id;
        $this->save();
    }

    public function setOrdenPendiente()
    {
        $this->estado_id  = 7;
        $this->usuario_id = \Auth::user()->id;
        $this->monto_pagado   = 0;
        $this->monto_diferido = $this->total_bruto;
        $this->save();

        $this->pagos->each->eliminarPago();
    
    }
                  
}
