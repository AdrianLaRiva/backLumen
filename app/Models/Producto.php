<?php

namespace App\Models;

use App\Models\ItemCotizacionProducto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';

    protected $cascadeDeletes = ['stocks','stockTotal'];

    protected $dates = ['deleted_at'];

    protected $fillable = ['codigo', 'nombre', 'marca', 'precio_compra_neto', 'precio_venta_neto', 'unidad_id', 'modificacion', 'usuario_id','quiebre_stock','caso_stock_cero'];

    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad', 'unidad_id', 'id');
    }

    public function conveniosVenta()
    {
        return $this->hasMany('App\Models\ProductoConvenioVenta', 'producto_id', 'id');
    }

    public function listasPrecio()
    {
        return $this->hasMany('App\Models\ProductoListaPrecio', 'producto_id', 'id');
    }
    public function ItemsCotizacionProducto()
    {
        return $this->hasMany('App\Models\ItemCotizacionProducto', 'producto_id', 'id');
    }

    public function ItemsCotizacionProductoVenido()
    {
        return $this->hasMany('App\Models\ItemCotizacionProducto', 'producto_id', 'id');
    }

    public function cantidadesVendidas()
    {
        $products = ItemCotizacionProducto::join('cotizaciones', 'cotizaciones.id', "items_cotizaciones_productos.cotizacion_id")
            ->where("producto_id", $this->id)
            ->where('cotizaciones.estado_id', 1)
            ->select(DB::raw('SUM(cantidad) as total_cantidad'))
            ->get();

        return $products->first()->total_cantidad;

    }

    public function stocks()
    {
        return $this->hasMany('App\Models\Stock');
    }

    public function stockTotal()
    {   
        return $this->hasOne('App\Models\StockTotal', 'producto_id', 'id');
    }

    public function isSellStockCero()
    {
        if($this->caso_stock_cero == 1)
        {
            return true;
        }

        return false;
    } 

    public function getBodegas()
    {   
        $bodegas = [];
        foreach ($this->stocks as $key => $value) {
            
            if($value->stock_disponible > 0 && $value->seccion && !in_array($value->seccion->bodega, $bodegas))
            {
                $bodegas[] = $value->seccion->bodega;
                
            }

        }
        $bodegas = array_unique($bodegas);
        return  $bodegas;
    }

    public function getBodegasConStock()
    {   
        $bodegas = [];
        foreach ($this->stocks as $key => $value) {

            if($value->stock_disponible > 0){
                $bodegas[] = $value->seccion->bodega;
            }
        }
        $bodegas = array_unique($bodegas);
        return  $bodegas;
    }

    public static function conStock()
    {   
        $productos = Producto::all();  
        foreach ($productos as $key => $value) {
            if($value->stocks->count() < 1 || $value->stocks->sum->stock_disponible < 0.1)
            {
                 $productos->pull($key);    
            }
        }   
        return $productos;
    }  
}
