<?php

namespace App\Models;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListaPrecio extends Model
{

    use SoftDeletes;

    use CascadeSoftDeletes;
    protected $cascadeDeletes = ['productosListaPrecio'];

    protected $table = 'listas_precio';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id',
        'nombre',
        'usuario_id',
        'fecha',

    ];

    public function productosListaPrecio()
    {

        return $this->hasMany('App\Models\ProductoListaPrecio', 'lista_precio_id', 'id');
    }

    public function productExist($id)
    {
        $a = $this->productosListaPrecio;

        foreach ($a as $key => $value) {

            if ($value->producto_id == $id) {

                return $value->precio_venta_neto;
            }
        }
        return false;
    }
}
