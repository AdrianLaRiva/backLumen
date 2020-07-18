<?php

namespace App\Http\Controllers;
use App\Models\Cotizacion;
use App\Models\Cobranza;
use App\Models\Comuna;
use App\Models\Estado;
use App\Models\Pago;
use App\Models\Region;
use App\Utils;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \stdClass;

class CotizacionController extends Controller
{

    public function index(Request $request)
    {
        if(!$request->isJson())
            return response()->json(["Error" => "Unauthorized"], 401,[]);

            $cotizacion = Cotizacion::take(20)->get();
            
            $cotizacion = $cotizacion->map(function ($row,$key) {
                    
                $row->total_neto                   = Utils::inverseFormat($row->total_neto);
                $row->total_bruto                  = Utils::inverseFormat($row->total_bruto);
                $date                              = \DateTime::createFromFormat('Y-m-d', $row->fecha);
                $row->fecha                        = $date->format('d/m/Y');
                $row->estado                       = $row->estado;
                $row->region                       = $row->region;
                $row->comuna                       = $row->comuna;
                return $row;
            });

        return $cotizacion;
    }

    public function create(Request $request)
    {
        if(!$request->isJson())
            return response()->json(["Error" => "Unauthorized"], 401,[]);

        $regiones = Region::all();

        return response()->json($regiones);

    }

    public function store(Request $request)
    {
        if(!$request->isJson())
            return response()->json(["Error" => "Unauthorized"], 401,[]);

        $cotizacion = new Cotizacion();
        $cotizacion->cliente                      = $request->cliente;
        $cotizacion->total_neto                   = Utils::numberFormat($request->total_neto);
        $cotizacion->iva                          = Utils::numberFormat($request->iva);
        $cotizacion->total_bruto                  = Utils::numberFormat($request->total_bruto);
        $date                                     = \DateTime::createFromFormat('d/m/Y', $request->fecha);
        $cotizacion->fecha                        = $date->format('Y-m-d');
        $cotizacion->estado_id                    = 2;
        $cotizacion->region_id                    = (Region::find($request->region)->id);
        $cotizacion->comuna_id                    = (Comuna::find($request->comuna)->id);

        $cotizacion->save();

        return response()->json(["store" => true, 'cotizacion' => $cotizacion], 200,[]);

    }


    public function update(Request $request, $id)
    {
        if(!$request->isJson())
            return response()->json(["Error" => "Unauthorized"], 401,[]);

        $cotizacion = Cotizacion::find($id);

        if(!$cotizacion)
            return response()->json(["Error" => "cotizacion no valida"], 500,[]);


        $cotizacion->cliente                      = $request->cliente;
        $cotizacion->total_neto                   = Utils::numberFormat($request->total_neto);
        $cotizacion->iva                          = Utils::numberFormat($request->iva);
        $cotizacion->total_bruto                  = Utils::numberFormat($request->total_bruto);
        $date                                     = \DateTime::createFromFormat('d/m/Y', $request->fecha);
        $cotizacion->fecha                        = $date->format('Y-m-d');
        $cotizacion->estado_id                    = 2;
        $cotizacion->region_id                    = (Region::find($request->region)->id);
        $cotizacion->comuna_id                    = (Comuna::find($request->comuna)->id);

        $cotizacion->save();

        return response()->json(["update" => true, 'cotizacion' => $cotizacion], 200,[]);

    }


    public function delete(Request $request, $id)
    {
        if(!$request->isJson())
            return response()->json(["Error" => "Unauthorized"], 401,[]);

        $cotizacion = Cotizacion::find($id);

        if(!$cotizacion)
            return response()->json(["Error" => "cotizacion no valida"], 500,[]);

        $cotizacion->delete();

        return response()->json(["delete" => true, 'id' => $id], 200,[]);

    } 


    public function getComunas(Request $request, $id)
    {
        if(!$request->isJson())
            return response()->json(["Error" => "Unauthorized"], 401,[]);

        $comunas =  Comuna::where('region_id',$id)->get();

        if(!$comunas)
            return response()->json(["Error" => "region no valida"], 500,[]);

        return response()->json(["getComunas" => true, 'comunas' => $comunas], 200,[]);

    } 
}
