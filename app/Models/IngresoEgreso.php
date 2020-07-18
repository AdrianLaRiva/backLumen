<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class IngresoEgreso extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    //protected $cascadeDeletes = '';

    protected $table = 'ingresos_egresos';

    protected $dates = ['deleted_at'];

    protected $fillable = ["guia_id", "producto_id","item_id", "bodega_id","seccion_id", "cantidad", "usuario_id", "fecha", "motivo", "seccion_id_destino", "bodega_id_destino", "tipo_ingreso_egreso"];

    public function guia()
    {
        return $this->belongsTo('App\Models\MovimientoGuia', 'guia_id', 'id');
    }

    public function seccionOrigen()
    {
        return $this->belongsTo('App\Models\SeccionBodega', 'seccion_id', 'id');
    }

    public function bodegaOrigen()
    {
        return $this->belongsTo('App\Models\Bodega', 'bodega_id', 'id');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id');
    }

      public function seccionDestino()
    {
        return $this->belongsTo('App\Models\SeccionBodega', 'guia_id_destino', 'id');
    }

    public function bodegaDestino()
    {
        return $this->belongsTo('App\Models\Bodega', 'guia_id_destino', 'id');
    }
}
