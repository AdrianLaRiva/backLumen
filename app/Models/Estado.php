<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Estado extends Model
{
    protected $table = 'estados';

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre',
        'modulo_id',
    ];

    public function cotizaciones()
    {

        return $this->hasMany('App\Models\Cotizacion', 'id', 'estado_id');
    }

    public static function estadosCotizacion()
    {
        return Estado::where('modulo_id', 1)->get();
    }

    public static function estadosCobranza()
    {
        return Estado::whereIn('id', [11, 12, 16, 17])->orderBy('nombre', 'asc')->get();

    }

    public static function estadosCobranzaPeriodica()
    {
        return Estado::where('id', 13)->orWhere('id', 14)->get();

    }

    public static function estadosCobranzaControlPagos()
    {
        return Estado::where('id', 11)->orWhere('id', 9)->orWhere('id', 10)->orWhere('id', 15)->get();

    }

    public static function estadosOrdenCompra()
    {
        return Estado::where('modulo_id', 4)->get();
    }

    public static function estadosMovimiento()
    {
        return Estado::where('modulo_id', 8)->get();
    }

    public function devoluciones()
    {
        return $this->hasMany('App\Models\Devolucion');
    }

    public static function estadosDevoluciones()
    {
        return Estado::whereIn('id',[4,5,6,20])->get();
    }
}
