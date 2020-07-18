<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemMovimiento extends Model
{
    use SoftDeletes;

    protected $table = 'items_movimiento';

    protected $dates = ['deleted_at'];

    protected $fillable = ['producto_id',
        'movimiento_id',
        'cantidad',
        'cantidad_despachada',
        'cantidad_por_despachar',
        'item_id',
        'data_decimales'
    ];

    public function movimiento()
    {

        return $this->belongsTo('App\Models\Movimiento', 'movimiento_id', 'id');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id');
    }


    public function despachada($cantidad)
    {
        $this->cantidad_por_despachar = $this->cantidad_por_despachar - $cantidad;
        $this->cantidad_despachada = $this->cantidad_despachada + $cantidad;
        $this->save();

        return $this;
    }
    public function reverseDespachada($cantidad)
    {
        $this->cantidad_por_despachar = $this->cantidad_por_despachar + $cantidad;
        $this->cantidad_despachada = $this->cantidad_despachada - $cantidad;
        $this->save();

        return $this;
    }


    public function isCompleted()
    {
        if($this->cantidad_por_despachar == 0.00 && $this->cantidad_despachada == $this->cantidad)
        {
            return true;
        }

        return false;
    }

    public function isPorIniciar()
    {
       if($this->cantidad_por_despachar == $this->cantidad && ($this->cantidad_despachada == 0 || $this->cantidad_despachada == null))
        {
            return true;
        }

        return false;
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
