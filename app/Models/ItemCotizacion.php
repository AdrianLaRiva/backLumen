<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCotizacion extends Model
{
    use SoftDeletes;

    protected $table = 'items_cotizaciones';

    protected $dates = ['deleted_at'];

    protected $fillable = ['cotizacion_id',
        'nombre_producto',
        'descripcion',
        'cantidad',
        'precio_unitario',
        'descuento',
        'total',
    ];

    public function cotizacion()
    {

        return $this->belongsTo('App\Models\Cotizacion', 'cotizacion_id', 'id');
    }

}
