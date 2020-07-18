<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Movimiento extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['itemsMovimiento','movimientoGuia'];

    protected $table = 'movimientos';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id','cotizacion_id','oc_id', 'devolucion_id' ,'fecha_aprobacion','usuario_id','tipo_ingreso_egreso', 'estado_id'];

    public function movimientoGuia()
    {
        return $this->hasMany('App\Models\MovimientoGuia', 'movimiento_id', 'id');
    }

    public function itemsMovimiento()
    {
        return $this->hasMany('App\Models\ItemMovimiento', 'movimiento_id', 'id');
    }


    public function cotizacion()
    {
        return $this->belongsTo('App\Models\Cotizacion', 'cotizacion_id', 'id');

    }

    public function ordenCompra()
    {
        return $this->belongsTo('App\Models\OrdenCompra', 'oc_id', 'id');

    }

    public function tipoIngresoEgreso()
    {
        return $this->belongsTo('App\Models\TipoIngresoEgreso', 'tipo_ingreso_egreso', 'id');

    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'estado_id', 'id');

    }

    public function isPorInciar()
    {
        if($this->estado_id == 18)//18 es por iniciar
        {
            return true;
        }
    
        return false;
    }

    public function isActive()
    {
        if($this->estado_id == 19)//19 es activo
        {
            return true;
        }
    
        return false;
    }

    public function isCanceled()
    {
        if($this->estado_id == 21)//21 es anulado por devolucion
        {
            return true;
        }
    
        return false;
    }

    public function isCompleted()
    {
        if($this->estado_id == 20) //20 es completado
        {
            return true;
        }
    
        return false;
    }

    public function isEgreso()
    {
        if($this->tipo_ingreso_egreso == 1  )
        {
            return true;
        }
    
        return false;
    }
    public function isIngreso()
    {
        if($this->tipo_ingreso_egreso == 2)         {
            return true;
        }
    
        return false;
    }

    public function isItemsCompleted()
    {

        foreach ($this->itemsMovimiento as $key => $value) {

            if(!$value->isCompleted())
            {
                return false;
            }

        }

        return true;

    }

    public function isMovimientoInterno()
    {
        if($this->tipo_ingreso_egreso == 3)
        {
            return true;
        }
    
        return false;
    }


    public function completar()
    {
        $this->estado_id = 20;
        $this->usuario_id = \Auth::user()->id;
        $this->save();     
    }

    public function activar()
    {
        $this->estado_id = 19;
        $this->usuario_id = \Auth::user()->id;
        $this->save();     
    }
 

    public function porIniciar()
    {
        $this->estado_id = 18;
        $this->usuario_id = \Auth::user()->id;
        $this->save();     
    }

    public static function getPorIniciarCount()
    {
       return Movimiento::where('estado_id',18)->count();
    }

 
}
