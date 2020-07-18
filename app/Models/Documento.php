<?php

namespace App\Models;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'documentos';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre, modulo_id'];

}
