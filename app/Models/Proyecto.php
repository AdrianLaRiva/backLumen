<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
class Proyecto extends Model
{
    use SoftDeletes,CascadeSoftDeletes;
    protected $cascadeDeletes = ['gestores'];
    protected $table    = 'proyectos';
    protected $fillable = [
        'titulo',
        'descripcion',
        'cliente_id',
        'usuario_id',
        'contacto_id',
        'tipo_proyecto',
        'fecha_inicio',
        'fecha_fin',
        'intervalo_meses',
        'padre_id',
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function clienteProveedor()
    {
        return $this->belongsTo('App\Models\ClienteProveedor');
    }
    public function contacto()
    {
        return $this->belongsTo('App\Models\ContactoClienteProveedor');
    }
    public function gestores()
    {
        return $this->hasMany('App\Models\Gestor');
    }
 
}