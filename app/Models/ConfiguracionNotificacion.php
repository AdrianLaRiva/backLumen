<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionNotificacion extends Model
{
    protected $table = 'config_notificaciones';

    protected $dates = ['deleted_at'];


    protected $fillable = [
    						'modulo_id',
    						'reglas',
    						'submodulo',
                        ];
 
}
