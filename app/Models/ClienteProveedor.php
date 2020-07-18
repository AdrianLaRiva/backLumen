<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ClienteProveedor extends Model
{
 

    protected $table          = 'clientes_proveedores';


    protected $dates = ['deleted_at'];

    protected $fillable = ['rut',
        'razon_social',
        'nombre_fantasia',
        'tipo_empresa_id',
        'giro',
        'cliente_proveedor',
        'usuario_id',
    ];

    public function sucursales()
    {

        return $this->hasMany('App\Models\Sucursal');

    }

    public function tipoEmpresa()
    {

        return $this->belongsTo('App\Models\TipoEmpresa', 'tipo_empresa_id', 'id');
    }

    public function tipoCliente()
    {

        return $this->belongsTo('App\Models\TipoClienteProveedor', 'cliente_proveedor', 'id');
    }

    public function conveniosVenta()
    {

        return $this->hasMany('App\Models\ConvenioVenta', 'cliente_proveedor_id', 'id');
    }

    public function cotizaciones()
    {

        return $this->hasMany('App\Models\Cotizacion', 'cliente_id', 'id');
    }

    public function contactos()
    {

        return $this->hasMany('App\Models\ContactoClienteProveedor', 'cliente_proveedor_id', 'id');
    }

    public function a()
    {
        return $this->sucursales->first()->direccion;
    }

    public function mainAddress()
    {

        foreach ($this->sucursales as $key => $value) {

            if ($value->principal == 1) {
                return $value;
            }

        }

        return null;
    }

    public function ordenesCompra()
    {
        return $this->hasMany('App\Models\OrdenCompra', 'cliente_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'cliente_proveedor_id', 'id');
    }

    public function totalCotizado()
    {
        return $this->cotizaciones->sum('total_bruto');

    }
    public function totalCotizadoAprobado()
    {
        return $this->cotizaciones->where('estado_id', 1)->sum('total_bruto');

    }
    public function proyecto()
    {

        return $this->hasMany('App\Models\Proyecto');
    }

    public function devolucion()
    {

        return $this->hasMany('App\Models\Devolucion');
    }

}
