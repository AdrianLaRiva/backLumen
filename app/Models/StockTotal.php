<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockTotal extends Model
{
    use SoftDeletes;

    protected $table = 'stocks_total';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id',
        'producto_id',
        'stock_disponible',
		'stock_reservado',
		'stock_vendido',
		'usuario_id',

    ];

    public function reservaProducto($cantiddad)
    {
        $this->stock_disponible = $this->stock_disponible - $cantiddad;
        $this->stock_reservado = $this->stock_reservado + $cantiddad;
        $this->usuario_id = \Auth::user()->id;
        $this->save();
    } 

    public function liberaProducto($cantiddad)
    {
        $this->stock_disponible = $this->stock_disponible + $cantiddad;
        $this->stock_reservado = $this->stock_reservado - $cantiddad;
        $this->usuario_id = \Auth::user()->id;
        $this->save();
    } 

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id', 'id');
    }

    
    public function discountByStockDisponible($cantidad,$type)
    {   
        $this->stock_disponible = $this->stock_disponible - $cantidad;
        if($type != "movimiento_interno")
        {
            $this->stock_vendido    = $this->stock_vendido + $cantidad;
        }
        $this->usuario_id       = \Auth::user()->id; 
        $this->save();
    }

    public function discountByStockReservado($cantidad)
    {
        $this->stock_reservado  = round($this->stock_reservado - $cantidad,2);
        $this->stock_vendido    = round($this->stock_vendido + $cantidad,2);
        $this->usuario_id       = \Auth::user()->id; 
        $this->save();
    }

    public function add($cantidad)
    {   
        $this->stock_disponible = round($this->stock_disponible + $cantidad,2);
        $this->usuario_id       = \Auth::user()->id; 
        $this->save();
    }

    public function addByStockReservado($cantidad)
    {
        $this->stock_reservado  = round($this->stock_reservado + $cantidad,2);
        $this->stock_vendido    = round($this->stock_vendido - $cantidad,2);
        $this->usuario_id       = \Auth::user()->id; 
        $this->save();
    }
}
