<?php

namespace App\Models;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConvenioVenta extends Model
{

    use SoftDeletes;

    use CascadeSoftDeletes;

    protected $cascadeDeletes = ['productosConvenioVenta'];
    protected $table          = 'convenios_venta';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'nombre', 'usuario_id', 'fecha', 'descripcion', 'cliente_proveedor_id'];

    public function customer()
    {
        return $this->belongsTo('App\Models\ClienteProveedor', 'cliente_proveedor_id', 'id');
    }

    public function productosConvenioVenta()
    {
        return $this->hasMany('App\Models\ProductoConvenioVenta', 'convenio_venta_id', 'id');
    }

    public function productExist($id)
    {
        $a = $this->productosConvenioVenta;

        foreach ($a as $key => $value) {

            if ($value->producto_id == $id) {

                return $value;
            }
        }
        return false;
    }
}
