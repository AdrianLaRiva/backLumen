<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajador extends Model
{
	use SoftDeletes;
	
    protected $table = 'trabajadores';

    protected $dates = ['deleted_at'];

    protected $fillable = ['rut',
    						'nombre',
    						'cargo',
						  	'direccion',
						  	'telefono',
						  	'telefono',
						  	'isapre',
						  	'afp',
						  	'vacaciones',
						  	'fecha_contrato',
						  	'fecha_finiquito'
						  ];
}
