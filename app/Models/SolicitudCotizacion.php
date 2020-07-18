<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudCotizacion extends Model
{
    protected $table = 'solicitud_cotizaciones';
    protected $dates = ['deleted_at'];

    protected $fillable = ['id',
        'razon_social',
        'email',
        'rut',
        'header',
        'items',
        'fecha',
        'estado_id',
    ];

}
