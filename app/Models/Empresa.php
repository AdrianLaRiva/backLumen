<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

    protected $table = 'empresas';

    protected $dates = ['deleted_at'];

    protected $fillable = ['rut',
        'razon_social',
        'nombre_fantasia',
        'direccion',
        'giro',
        'telefono',
        'correo',
        'comuna_id',
        'region_id',
        'url_logo',
        'banco',
        'nro_cuenta',
        'tipo_cuenta',
        'rut_titular',
        'titular',
        'url_logo',
        'url_logo_original',
        'config_mail_driver',
        'config_mail_host',
        'config_mail_puerto',
        'config_mail_clave',
        'config_mail_email',
    ];

    public function region()
    {

        return $this->belongsTo('App\Models\Region');
    }

    public function comuna()
    {

        return $this->belongsTo('App\Models\Comuna');
    }
}
