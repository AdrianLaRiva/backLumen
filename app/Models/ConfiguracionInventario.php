<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionInventario extends Model
{

    protected $table = 'config_inventario';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id',
        'reserva',
    ];



    public function reservaProducto()
    {
    	if($this->reserva==1)
    	{
    		return true;
    	}
    	return false;
    }
}
