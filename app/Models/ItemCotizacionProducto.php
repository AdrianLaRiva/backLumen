<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCotizacionProducto extends Model
{
    use SoftDeletes;

    protected $table = 'items_cotizaciones_productos';

    protected $dates = ['deleted_at'];

    protected $fillable = ['cotizacion_id',
        'producto_id',
        'unidad_id',
        'descripcion',
        'cantidad',
        'precio_unitario',
        'descuento_porcentaje',
        'descuento_pesos',
        'total',
        'cantidad_despachada',
        'cantidad_por_despachar',
        'stock_disponible',
        'data_decimales',
    ];

    public function cotizacion()
    {

        return $this->belongsTo('App\Models\Cotizacion', 'cotizacion_id', 'id');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id')->withTrashed();
    }

    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad', 'unidad_id', 'id');
    }

}
