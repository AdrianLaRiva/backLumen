<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
use Authenticatable, Authorizable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable       = [
        'name', 'rut', 'apellido', 'rol_id', 'email', 'password', 'api_token','loged'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }

    public function rol()
    {
        return $this->belongsTo('App\Models\Rol');
    }


    public function clientesProveedores()
    {
        return $this->hasMany('App\Models\ClienteProveedor', 'usuario_id', 'id');
    }

    public function isUserClienteProveedor()
    {
        return $this->belongsTo('App\Models\ClienteProveedor', 'cliente_proveedor_id', 'id');
    }

    public function ordenesCompra()
    {

        return $this->hasMany('App\Models\OrdenCompra', 'usuario_id', 'id');
    }

    public function cotizaciones()
    {

        return $this->hasMany('App\Models\Cotizacion', 'usuario_id', 'id');
    }


}
