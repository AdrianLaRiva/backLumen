<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoServicio extends Model
{
    use SoftDeletes;

    protected $table = 'grupo_servicios';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre', 'data', 'descripcion', 'usuario_id'];

}
