<?php

namespace App;

use App\Models\Notificacion;
use App\Notifications\MyResetPassword;
use App\Utils;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable       = [
        'name', 'rut', 'apellido', 'rol_id', 'cargo', 'email', 'telefono', 'movil', 'password', 'root', 'root_token', 'cliente_proveedor_id','firma','config_mail_host','config_mail_puerto','config_mail_email','config_mail_clave',
    ];

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
