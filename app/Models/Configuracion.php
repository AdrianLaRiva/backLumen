<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuracion extends Model
{
    use SoftDeletes;
    
  	protected $table = 'configuraciones';

    protected $dates = ['deleted_at'];


    protected $fillable = ['campos_cotizacion',
    						'campos_orden_compra',
    						'condicion_cotizacion',
    						'condicion_orden_compra',
    						'columnas_cliente_proveedor'
                         ];
                         
}
