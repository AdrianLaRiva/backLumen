<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DevolucionPago extends Model
{
     use SoftDeletes;

    protected $table = 'devoluciones_pagos';

    protected $dates = ['deleted_at'];

    protected $fillable = ['monto','fecha_pago', 'metodo_pago_id','usuario_id','devolucion_id','comprobante','comprobante_original'];

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function devolucion()
    {
        return $this->belongsTo('App\Models\Devolucion');
    }

    public function metodoPago()
    {
        return $this->belongsTo('App\Models\MetodoPago');

    }

}
