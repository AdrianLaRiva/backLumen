<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoClienteProveedor extends Model
{
    use SoftDeletes;

	protected $table = 'tipos_cliente_proveedor';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre'];


    public function clientesProveedores()
	{
		return $this->hasMany('App\Models\ClienteProveedor','id','cliente_proveedor');
	
	}


}

