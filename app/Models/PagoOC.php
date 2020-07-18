<?php

namespace App\Models;

use App\Utils;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagoOC extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'pagos_oc';

    protected $dates = ['deleted_at'];

    protected $fillable = ['monto',
        'orden_compra_id',
        'monto',
        'fecha',
        'usuario_id',
        'comprobante',
        'comprobante_original',
    ];

    public function ordenCompra()
    {
        return $this->belongsTo('App\Models\OrdenCompra', 'orden_compra_id', 'id');

    }

    public function metodoPago()
    {
        return $this->belongsTo('App\Models\MetodoPago', 'metodo_pago_id', 'id');

    }

    public function makeDataShow($payment)
    {
        $payment->monto = Utils::inverseFormat($payment->monto);
        $payment->fecha = \DateTime::createFromFormat('Y-m-d', $payment->fecha);
        $payment->fecha = $payment->fecha->format('d/m/Y');
        $payment->pago  = $payment->metodoPago->nombre;

        return $payment;
    }

    public function eliminarPago()
    {
        $this->usuario_id = \Auth::user()->id;
        $this->save();
        $this->delete();    
    }

}
