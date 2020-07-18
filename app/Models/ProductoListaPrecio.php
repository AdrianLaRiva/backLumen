<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoListaPrecio extends Model
{
    use SoftDeletes;

    protected $table = 'productos_listas_precio';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id',
        'producto_id',
        'lista_precio_id',
        'precio_venta_neto',

    ];

    public function ListaPrecio()
    {

        return $this->belongsTo('App\Models\ListaPrecio', 'lista_precio_id', 'id');
    }
}
