<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfiguracionSolicitudCotizacion extends Model
{
    use SoftDeletes;

    protected $table = 'config_solicitud_cotizacion';

    protected $dates = ['deleted_at'];

    protected $fillable = ['descripcion', 'campos_dinamicos', 'accion', 'redireccionar', 'mensaje', 'usuario_id'];

}
