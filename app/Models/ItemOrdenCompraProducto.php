<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemOrdenCompraProducto extends Model
{

    use SoftDeletes;

    protected $table = 'items_orden_compra_productos';

    protected $dates = ['deleted_at'];

    protected $fillable = ['orden_compra_id',
        'producto_id',
        'unidad_id',
        'descripcion',
        'cantidad',
        'precio_unitario',
        'descuento_porcentaje',
        'descuento_pesos',
        'total',
        'data_decimales',
        
    ];

    public function ordenCompraProducto()
    {

        return $this->belongsTo('App\Models\OrdenCompraProducto', 'oc_id', 'id');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id')->withTrashed();
    }

    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad', 'unidad_id', 'id');
    }

    public  function setDataDecimales()
    {
        $this->data_decimales = 0;

        if($this->producto->unidad)
        {
            $this->data_decimales = $this->producto->unidad->decimales;
       
        }
             
        return $this;
    
    }

}
