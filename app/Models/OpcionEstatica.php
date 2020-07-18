<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpcionEstatica extends Model
{
    use SoftDeletes;

    protected $table = 'opciones_estaticas';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre', 'tipo', 'valores', 'descripcion', 'usuario_id'];

}
