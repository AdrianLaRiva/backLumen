<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class MovimientoGuia extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ["ingresosEgresos"];

    protected $table = 'movimientos_guias';

    protected $dates = ['deleted_at'];

    protected $fillable = ["id","guia_id","usuario_id", "fecha", "reversada", "comentario", "adjunto", "adjunto_original"];

    public function movimiento()
    {
        return $this->belongsTo('App\Models\Movimiento', 'movimiento_id', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'usuario_id', 'id');
    }
    
     public function ingresosEgresos()
    {
        return $this->hasMany('App\Models\IngresoEgreso', 'guia_id', 'id');
    }
}
