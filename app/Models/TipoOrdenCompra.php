<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoOrdenCompra extends Model
{	
	use SoftDeletes;
	
    protected $table = 'tipos_orden_compra';

    protected $dates = ['deleted_at'];


    protected $fillable = ['nombre'];
    
}
