<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificacion extends Model
{
    use SoftDeletes;

    protected $table = "notificaciones";
    protected $dates = ['deleted_at'];

    protected $fillable = ['titulo',
        'mensaje',
        'leido',
        'etiqueta',
        'modelo',
        'objeto_id',
        'created_at',
        'grupo',
        'destinatarios',
    ];
}
