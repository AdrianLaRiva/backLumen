<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rol extends Model
{	
	use SoftDeletes;
	
  
    protected $table = 'roles';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre',
							'permisos',
							'descripcion'];

 	public function users()
 	{
 		return $this->hasMany('App\User','rol_id','id');
 	}

 	public  function checkUsers()
 	{
		foreach ($this->users as $key => $value) {
			
			$value->rol_id = NULL;
			$value->save();
		} 	
 	}

}
