<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Region extends Model
{	
	use SoftDeletes;
	
    protected $table = 'regiones';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre','numero'];

    public function comunas()
	{
		return $this->hasMany('App\Models\Comuna');
	}
}


