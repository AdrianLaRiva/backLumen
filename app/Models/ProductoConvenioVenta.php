<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoConvenioVenta extends Model
{
    use SoftDeletes;

    protected $table = 'productos_convenio_venta';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'producto_id', 'convenio_venta_id', 'descuento_porcentaje', 'descuento_pesos'];

    public function convenioVenta()
    {

        return $this->belongsTo('App\Models\ConvenioVenta', 'convenio_venta_id', 'id');
    }
}
