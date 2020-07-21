<?php

namespace App\Models;

use App\Utils;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';

    protected $dates = ['deleted_at'];

    protected $fillable = ['cliente',
        'persona_contacto',
        'concepto',
        'email_contacto',
        'total',
        'estado_id',
        'comuna_id',
        'region_id'
    ];


    public function estado()
    {

        return $this->belongsTo('App\Models\Estado', 'estado_id', 'id');
    }


    public function region(){

        return $this->belongsTo('App\Models\Region');
    }

    public function comuna(){

        return $this->belongsTo('App\Models\Comuna');
    }

}
