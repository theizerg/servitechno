<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use App\Models\LineaOrdenServicio;
use App\Models\Cliente;
use App\Models\Marcas;
use App\Models\Modelos;
use App\Models\TipoEquipos;
use App\Models\HistorialEquipo;
use Carbon\Carbon;

class OrdenServicioController extends Controller
{
    
   public function index()
   {

      $ordenes = OrdenServicio::where('organismo_id',\Auth::user()->organismo_id)
     ->where('sucursal_id', \Auth::user()->sucursal_id)
     ->get();

     
     return view ('admin.ordenservicios.index', compact('ordenes'));


   }

   public function clientes($id)
   {

     $cliente = Cliente::find($id);
     return $cliente;
   }

   public function marca($id)
   {

     $marca = Marcas::where('organismo_id',\Auth::user()->organismo_id)
     ->where('sucursal_id', \Auth::user()->sucursal_id)
     ->where('tipo_equipo_id', $id)
     ->get();
    return $marca;
   }

   public function modelos($id)
   {

     $modelo = Modelos::where('organismo_id',\Auth::user()->organismo_id)
     ->where('sucursal_id', \Auth::user()->sucursal_id)
     ->where('marca_id', $id)
     ->get();
    return $modelo;
   }

   public function guardar(Request $request)
   {
        //dd($request);

        $input = $request->all();
        $data = [];
        $data['tipo_reparacion'] = json_encode($input['tipo_reparacion']);

        $orden = new OrdenServicio();
          //dd($request->cliente_id);
         $orden->cliente_id            = $request->cliente_id;
         $orden->tipo_equipo_id        = $request->tipo_equipo_id;
         $orden->marca_id              = $request->marca_id;
         $orden->modelo_id             = $request->modelo_id;
         $orden->tipo_reparacion       = $data['tipo_reparacion'];
         $orden->orservacion_recepcion = $request->orservacion_recepcion;
         $orden->accesorios            = $request->accesorios;
         $orden->imei                  = $request->imei;
         $orden->color                 = $request->color;
         $orden->clave                 = $request->clave;
         $orden->costo                 = $request->costo;
         $orden->anticipo              = $request->anticipo;
         $orden->fecha_entrega         = $request->fecha_entrega;
         $orden->estado_servicio_id    = 1;
         $orden->organismo_id          = \Auth::user()->organismo_id;
         $orden->sucursal_id           = \Auth::user()->sucursal_id;

         $orden->save();


         if ($orden) {
           
        $historial = new HistorialEquipo();

        $historial->orden_servicio_id = $orden->id;
        $historial->observacion_recepcion = $request->orservacion_recepcion;
        $historial->tipo_equipo_id = $request->tipo_equipo_id;
        $historial->cliente_id =$request->cliente_id;
        $historial->marca_id = $request->marca_id;
        $historial->modelo_id = $request->modelo_id;
        $historial->organismo_id = \Auth::user()->organismo_id;
        $historial->sucursal_id =\Auth::user()->sucursal_id;

        $historial->save();

          $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
           );
          return redirect()->back()->with($notification);


         }
         
      


   }

   public function editar(Request $request ,$id)
   {
     


         $orden =OrdenServicio::find($id);
          //dd($request->cliente_id);
         $orden->orservacion_recepcion = $request->orservacion_recepcion;
         $orden->estado_servicio_id    = $request->tipo_equipo_id;
         $orden->organismo_id          = \Auth::user()->organismo_id;
         $orden->sucursal_id           = \Auth::user()->sucursal_id;

         $orden->save();


         if ($orden) {


        $historial = new HistorialEquipo();
        
        $historial->orden_servicio_id = $orden->id;
        $historial->observacion_recepcion = $orden->orservacion_recepcion;
        $historial->tipo_equipo_id = $orden->tipo_equipo_id;
        $historial->cliente_id =$orden->cliente_id;
        $historial->marca_id = $orden->marca_id;
        $historial->modelo_id = $orden->modelo_id;
        $historial->organismo_id = \Auth::user()->organismo_id;
        $historial->sucursal_id =\Auth::user()->sucursal_id;

        $historial->save();
           

          $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
           );
          return redirect()->back()->with($notification);


         }

   }



  public function historial($id)
   {

    $enero = 'Enero';
    $febrero = 'febrero';
    $marzo = 'marzo';
    $abril = 'abril';
    $mayo = 'mayo';
    $junio = 'junio';
    $julio = 'julio';
    $agosto = 'agosto';
    $septiembre = 'septiembre';
    $octubre = 'octubre';
    $noviembre = 'noviembre';
    $diciembre = 'diciembre';
 $ordenes = OrdenServicio::where('organismo_id',\Auth::user()->organismo_id)
     ->where('sucursal_id', \Auth::user()->sucursal_id)
     ->where('estado_servicio_id', '>', 5)
     ->get();
    if (date('m') == 01) {
      $mes = $enero;
    }elseif (date('m') == 02) {
      $mes = $febrero;
    } elseif (date('m') == 03) {
      $mes = $marzo;
    }elseif (date('m') == 04) {
      $mes = $abril;
    }elseif (date('m') == 05) {
      $mes = $mayo;
    }elseif (date('m') == 06) {
      $mes = $junio;
    }elseif (date('m') == 07) {
      $mes = $julio;
    }elseif (date('m') == 8) {
      $mes = $agosto;
    }elseif (date('m') == 9) {
      $mes = $septiembre;
    }elseif (date('m') == 10) {
      $mes = $octubre;
    }elseif (date('m') == 11) {
      $mes = $noviembre;
    }elseif (date('m') == 12) {
      $mes = $diciembre;
    }
    
    $historiales = HistorialEquipo::where('orden_servicio_id',$id)->get();
     
  
   
  
   
    return view('admin.ordenservicios.equipo.historial',compact('mes','historiales'));
   }


   public function nuevo()
   {

    return view ('admin.ordenservicios.nuevo');
   }
}
