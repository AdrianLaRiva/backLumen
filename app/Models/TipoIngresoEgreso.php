<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoIngresoEgreso extends Model
{
    use SoftDeletes;

	protected $table = 'tipo_ingreso_egreso';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre'];
}
