<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modulo extends Model
{
    use SoftDeletes;

    protected $table = 'modulos';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre',
        'modulo_id',
        'estado',
        'objeto',
        'config_correo',
    ];

    public function moduloAcciones()
    {
        return $this->hasMany('App\Models\ModuloAccion', 'modulo_id', 'modulo_id');
    }

    public function documento()
    {
        return $this->hasOne('App\Models\Documento', 'modulo_id', 'id');
    }

        public function configuracionCorreo()
    {
        return $this->hasOne('App\Models\ConfiguracionCorreo');
    }
}
