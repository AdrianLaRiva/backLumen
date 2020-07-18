<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class ContactoClienteProveedor extends Model
{   
    use SoftDeletes, CascadeSoftDeletes;
    
    protected $cascadeDeletes = ['cotizaciones', 'ordenesCompra'];
    
    protected $table = 'contactos_cliente_proveedor';

    protected $dates = ['deleted_at'];


    protected $fillable = ['cliente_proveedor_id',
    						'nombre',
    						'correo',
    						'telefono',
                            'usuario_id'
                        ];
 

    public function clienteProveedor()
    {
        return $this->belongsTo('App\Models\ClienteProveedor');
    }

    public function cotizaciones()
    {
       return $this->hasMany('App\Models\Cotizacion','contacto_id','id');
    }
	
    public function ordenesCompra()
    {
       return $this->hasMany('App\Models\OrdenCompra','contacto_id','id');
    }	
	
    public function proyecto()
    {

        return $this->hasMany('App\Models\Proyecto');
    }
}
