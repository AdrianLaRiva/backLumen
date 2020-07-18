<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    protected $table = 'stocks';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id',
        'producto_id',
        'seccion_id',
        'stock_disponible',
        'usuario_id'
    ];


    public function seccion()
    {
    	return $this->belongsTo('App\Models\SeccionBodega');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }


    public function discount($cantidad)
    {  
        $this->stock_disponible = round($this->stock_disponible - $cantidad,2); 
        $this->usuario_id = \Auth::user()->id;
        $this->save();
        return $this;
    }

    public function add($cantidad)
    {   
        $this->stock_disponible = round($this->stock_disponible + $cantidad,2);
        $this->usuario_id = \Auth::user()->id;
        $this->save();
        return $this;
    }

}
