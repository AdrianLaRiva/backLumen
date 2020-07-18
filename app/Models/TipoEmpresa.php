<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEmpresa extends Model
{
    use SoftDeletes;

    protected $table = 'tipos_empresa';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre'];
}
