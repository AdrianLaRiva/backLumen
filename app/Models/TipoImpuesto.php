<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoImpuesto extends Model
{
    use SoftDeletes;

	protected $table = 'tipos_impuesto';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre', 'modulo_id'];
}
