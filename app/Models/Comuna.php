<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comuna extends Model
{
	use SoftDeletes;
	
    protected $table = 'comunas';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre', 'region_id'];

    public function region()
	{
		return $this->belongsTo('App\Models\Region');
	}
}

