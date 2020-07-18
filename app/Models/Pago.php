<?php

namespace App\Models;

use App\Utils;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['abonosPago'];
    protected $table          = 'pagos';

    protected $dates = ['deleted_at'];

    protected $fillable = ['monto',
        'monto_porcentaje',
        'fecha',
        'cobranza_id',
        'metodo_pago_id',
        'usuario_id',
        'monto_cobrado',
        'monto_diferido',
        'estado_id',
        'observaciones',
        'factura',
        'nro_factura',
        'factura_original',
        'oc',
        'nro_oc',
        'oc_original',
        'check_mail',
        'token',
        'responseCode',
        'devolucion',
        'fecha_devolucion'
    ];

    public function metodoPago()
    {
        return $this->belongsTo('App\Models\metodoPago', 'metodo_pago_id', 'id');

    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'estado_id', 'id');
    }

    public function cobranza()
    {
        return $this->belongsTo('App\Models\Cobranza', 'cobranza_id', 'id');
    }

    public function makeDataEdit($pago)
    {
        $pago->fecha         = \DateTime::createFromFormat('Y-m-d', $pago->fecha);
        $pago->fecha         = $pago->fecha->format('d/m/Y');
        $pago->monto         = Utils::inverseFormat($pago->monto);
        $pago->monto_cobrado = Utils::inverseFormat($pago->monto_cobrado);

        return $pago;
    }

    public function abonosPago()
    {

        return $this->hasMany('App\Models\AbonoPago', 'pago_id', 'id');
    }

    public function isNotCompleted()
    {
        if ($this->estado_id == 10 || $this->estado_id == 9) {

            return true;
        }
        return false;
    }

    public function started()
    {

        if ($this->oc || $this->factura || $this->estado_id == 11 || $this->monto_cobrado > 0) {

            return true;
        }
        return false;
    }

    public function updateMonto()
    {
        if ($this->monto == $this->monto_cobrado) {
            $this->estado_id = 11;
        } else if ($this->factura) {
            $this->estado_id = 10;
        }
        return $this;
    }

    public function devolucion()
    {
        return $this->hasOne('App\Models\Devolucion');
    }

}
