<?php

namespace App\Models;

use App\Utils;
use Carbon\Carbon;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cobranza extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['pagos'];

    protected $table = 'cobranzas';

    protected $dates = ['deleted_at'];

    protected $fillable = ['cotizacion_id',
        'monto',
        'monto_pagado',
        'orden_compra',
        'factura',
        'nro_cuotas',
        'estado_id',
        'comentarios',
        'fecha_inicio',
        'fecha_ultimo_pago',
        'intervalo_meses',
        'usuario_id',
        'orden_compra_original',
        'factura_original',
        'fecha_termino',
    ];

    public function cotizacion()
    {
        return $this->belongsTo('App\Models\Cotizacion', 'cotizacion_id', 'id');
    }
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'estado_id', 'id');
    }

    public function formaPago()
    {
        return $this->belongsTo('App\Models\FormaPago', 'forma_pago_id', 'id');
    }

    public function pagos()
    {
        return $this->hasMany('App\Models\Pago', 'cobranza_id', 'id');
    }

    public function daletePayments($month, $year)
    {
        $flag = 0;
        foreach ($this->pagos as $key => $value) {

            $value->date = new Carbon($value->fecha);

            if ($value->date->month == $month && $value->date->year == $year) {
                if ($value->estado_id == 11 || $value->monto_cobrado > 0) {
                    $flag = 1;
                } else {
                    $value->delete();
                }
            }
        }

        return $flag;
    }

    public function pagosFactura()
    {

        foreach ($this->pagos as $key => $value) {

            if ($value->factura) {
                return true;
            }
        }

        return false;
    }

    public function pagosOc()
    {

        foreach ($this->pagos as $key => $value) {

            if ($value->oc) {
                return true;
            }
        }

        return false;
    }

    public function prepareData()
    {
        foreach ($this->pagos as $key => $value) {
            $value = $value->makeDataEdit($value);
        }
        $this->monto_pagado = Utils::inverseFormat($this->monto_pagado);
        $this->monto        = Utils::inverseFormat($this->monto);
        return $this;
    }

    public function hasNotCompletePayment()
    {
        $aux = false;
        foreach ($this->pagos as $key => $value) {

            $aux = $value->isNotCompleted();
        }

        return $aux;
    }

    public function activeCharge()
    {
        $started = false;
        foreach ($this->pagos as $key => $value) {

            if ($value->started()) {
                $started = true;
            }

        }

        if ($started == true && $this->monto_pagado == $this->monto) {
            $this->estado_id = 11;
        } else if ($started == true) {
            $this->estado_id = 17;
        } else {
            $this->estado_id = 16;
        }

        return $this;
    }

    public function isPorIniciar()
    {
        if($this->estado_id == 16)
        {

            return true;
        }

        return false;

    }

    public function isVigente()
    {
        if($this->estado_id == 13)
        {
            return true;
        }

        return false;
    }
}
