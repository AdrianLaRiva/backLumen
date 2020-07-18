<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetodoPago extends Model
{
    use SoftDeletes;

    protected $table = 'metodos_pago';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre',
                            'descripcion'
                         ];


    public function pagos(){

        return $this->hasMany('App\Models\Pago','metodo_pago_id','id');
    }

     public function DevolucionPago(){

        return $this->hasMany('App\Models\DevolucionPago');
    }
}
