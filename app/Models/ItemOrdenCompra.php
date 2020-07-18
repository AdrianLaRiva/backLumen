<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemOrdenCompra extends Model
{
    use SoftDeletes;

    protected $table = 'items_orden_compra';

    protected $dates = ['deleted_at'];

    protected $fillable = ['orden_compra_id',
                            'nombre_producto',
                            'descripcion',
                            'cantidad',
							'precio_unitario',
							'descuento',
							'total',
                         ];


    public function OrdenCompra(){

        return $this->belongsTo('App\Models\OrdenCompra','orden_compra_id','id');
    }

}
