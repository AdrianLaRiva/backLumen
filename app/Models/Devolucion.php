<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devolucion extends Model
{
    use SoftDeletes;

    protected $table = 'devoluciones';

    protected $dates = ['deleted_at'];

    protected $fillable = ['total','monto_pagado','monto_diferido','productos_data', 'pago_id','usuario_id','cliente_id','estado_id','factura','factura_original', 'nro_factura','motivo'];

    public function Pago()
    {   
        return $this->belongsTo('App\Models\Pago');
    }

    public function clienteProveedor()
    {

        return $this->belongsTo('App\Models\ClienteProveedor');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function estado()
    {

        return $this->belongsTo('App\Models\Estado');
    }

    public function DevolucionPago()
    {
        return $this->hasMany('App\Models\DevolucionPago');
    }

}