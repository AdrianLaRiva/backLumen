<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accion extends Model
{
	use SoftDeletes, CascadeSoftDeletes;

	protected $table = 'acciones';
 	protected $dates = ['deleted_at'];


    protected $fillable = ['nombre',
                            'descripcion',
                         ];

    public function moduloAcciones()
    {
    	return $this->hasMany('App\Models\ModuloAccion','accion_id','id');
    }

}
