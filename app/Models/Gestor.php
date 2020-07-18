<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gestor extends Model
{
    use SoftDeletes;
    protected $table    = 'gestores';
    protected $fillable = [
        'titulo',
        'proyecto_id',
        'json_data',
        'gestor_inicial',
    ];

    public function proyecto()
    {
        return $this->belongsTo('App\Models\Proyecto');
    }
}
