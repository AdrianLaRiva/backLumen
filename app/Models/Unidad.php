<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidad extends Model
{
    use SoftDeletes;

    protected $table = 'unidades';

    protected $dates = ['deleted_at'];

    protected $fillable = ['unidad', 'descripcion','decimales'];

    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'unidad_id', 'id');

    }

    public function checkProductos()
    {
        foreach ($this->productos as $key => $value) {

            $value->unidad_id = null;
            $value->save();
        }
    }

}
