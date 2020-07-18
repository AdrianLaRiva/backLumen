<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bodega extends Model
{
    use SoftDeletes;

    protected $table = 'bodegas';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id',
        'nombre',
        'descripcion',
        'usuario_id'
    ];

    public function secciones()
    {
        return $this->hasMany('App\Models\SeccionBodega');
    }

}
