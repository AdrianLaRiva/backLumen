<?php

namespace App\Models;

use App\Utils;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';

    protected $dates = ['deleted_at'];

    protected $fillable = ['cliente',
        'subtotal',
        'total_neto',
        'iva',
        'total_bruto',
        'estado_id',
        'fecha',
        'comentario',
        'comuna_id',
        'region_id'
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

        return $this->hasMany('App\Models\ItemCotizacion', 'cotizacion_id', 'id');
    }

    public function region(){

        return $this->belongsTo('App\Models\Region');
    }

    public function comuna(){

        return $this->belongsTo('App\Models\Comuna');
    }

}
