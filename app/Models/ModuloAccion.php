<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
class ModuloAccion extends Model
{
    
    protected $table = 'modulo_acciones';

    protected $dates = ['deleted_at'];

    protected $fillable = ["accion_id","modulo_id"];


    public function modulo()
    {
        return $this->belongsTo('App\Models\Modulo','modulo_id','modulo_id');

    }

    public function accion()
    {
    	return $this->belongsTo('App\Models\Accion', 'accion_id','id');
    }
}
