<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPago extends Model
{	
	use SoftDeletes;
	
    protected $table = 'tipos_pago';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre'];


    public function cotizaciones()
	{
		return $this->hasMany('App\Models\Cotizacion','tipo_pago_id','id');
	
	}
}
