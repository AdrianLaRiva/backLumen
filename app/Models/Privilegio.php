<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Privilegio extends Model
{	
	use SoftDeletes;
	
    protected $table = 'privilegios';

    protected $dates = ['deleted_at'];

    protected $fillable = ['usuario_id',
                            'modulo_id',
                            'acceso_total',
                         ];
}
