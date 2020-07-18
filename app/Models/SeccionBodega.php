<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeccionBodega extends Model
{
    use SoftDeletes;

    protected $table = 'secciones_bodegas';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id',
        'nombre',
        'stock',
        'bodega_id',
        'usuario_id'
    ];

    public function bodega()
    {
        return $this->belongsTo('App\Models\Bodega', 'bodega_id', 'id');
    }

    public function stocks()
    {
        return $this->hasMany('App\Models\Stock','seccion_id','id');
    }
}
