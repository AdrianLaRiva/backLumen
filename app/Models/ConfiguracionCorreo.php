<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionCorreo extends Model
{
    
  	protected $table = 'config_correos';


    protected $fillable = ['asunto','mensaje','modulo_id','nombre'];

    public function modulo()
    {
        return $this->belongsTo('App\Models\Modulo');

    }
                         
}
