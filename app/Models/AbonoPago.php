<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbonoPago extends Model
{
    protected $table = 'abonos_pagos';
    protected $dates = ['deleted_at'];

    protected $fillable = ['pago_id',
        'monto',
        'fecha',
        'metodo_pago_id',
        'usuario_id',
    ];

    public function metodoPago()
    {
        return $this->belongsTo('App\Models\MetodoPago', 'metodo_pago_id', 'id');

    }

}
