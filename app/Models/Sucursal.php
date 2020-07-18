<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class Sucursal extends Model
{
     use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['cotizaciones', 'ordenesCompra'];

    protected $table = 'sucursales';

    protected $dates = ['deleted_at'];

    protected $fillable = [
                            'direccion',
                            'comuna_id',
                            'region_id',
			    	        'cliente_proveedor_id',
                            'usuario_id',
                       	];


    public function clienteProveedor()
    {
    	return $this->belongsTo('App\Models\ClienteProveedor','cliente_proveedor_id','id');
    }

    public function cotizaciones()
    {
       return $this->hasMany('App\Models\Cotizacion','sucursal_id','id');
    }
    
    public function ordenesCompra()
    {
       return $this->hasMany('App\Models\OrdenCompra','sucursal_id','id');
    }   

    public function region(){

        return $this->belongsTo('App\Models\Region');
    }

    public function comuna(){

        return $this->belongsTo('App\Models\Comuna');
    }


}


