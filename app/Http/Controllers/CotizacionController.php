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

            $cotizacion = Cotizacion::select("cliente","id","concepto","comuna_id", "total")->orderBy('id','desc')->get();
            
            $cotizacion = $cotizacion->map(function ($row,$key) {
                    
                $row->total                        = Utils::inverseFormat($row->total);
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
    
     public function show(Request $request, $id)
    {
        if(!$request->isJson())
            return response()->json(["Error" => "Unauthorized"], 401,[]);

         $cotizacion = Cotizacion::find($id);
         $cotizacion->total                        = Utils::inverseFormat($cotizacion->total);
        $cotizacion->comuna                       = $cotizacion->comuna;
        $cotizacion->region                       = $cotizacion->region;
         $cotizacion->estado                       = $cotizacion->estado;
            

        return response()->json($cotizacion);

    }

    public function store(Request $request)
    {   

        if(!$request->isJson())
        {
            return response()->json(["Error" => "Unauthorized"], 401,[]);
        }
        $cotizacion = new Cotizacion();
        $cotizacion->cliente                      = $request->cliente;
        $cotizacion->concepto                      = $request->concepto;
        $cotizacion->persona_contacto             = $request->persona_contacto;
        $cotizacion->email_contacto                 = $request->email_contacto;
        $cotizacion->total                        = Utils::numberFormat($request->total);
        $cotizacion->estado_id                    = 2;
        $cotizacion->region_id                    = (Region::find($request->region)->id);
        $cotizacion->comuna_id                    = (Comuna::find($request->comuna)->id);

        $cotizacion->save();
        
        $cotizacion = Cotizacion::find($cotizacion->id, ["cliente","id","concepto","comuna_id", "total"]);
        
        $cotizacion->total                        = Utils::inverseFormat($cotizacion->total);
        $cotizacion->comuna                       = $cotizacion->comuna;

        return response()->json(["store" => true, 'cotizacion' => $cotizacion], 200,[]);

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
