<?php

namespace App\Http\Controllers;

use App\Models\TipoReparaciones;
use Illuminate\Http\Request;

class TipoReparacionesController extends Controller
{
    public  function index()
    {
        $reparacionestipo = TipoReparaciones::where('organismo_id',\Auth::user()->organismo_id)
        ->where('sucursal_id',\Auth::user()->sucursal_id)
        ->get();


        return view ('admin.tiporeparaciones.index',compact('reparacionestipo'));
    }


    public function store(Request $request)
    {   
        
        $marca = new  TipoReparaciones();
        $marca->descripcion = $request->descripcion;
        $marca->status = $request->status;
        $marca->organismo_id = \Auth::user()->organismo_id;
        $marca->sucursal_id = \Auth::user()->sucursal_id;
        $marca->fecha = date('d/m/Y H:m:s');

        $marca->save();

        if ($marca) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }



    }


    public function update(Request $request, $id)
    {   
        //dd($request);
        
        $marca = TipoReparaciones::find($id);
        $marca->descripcion = $request->descripcion;
        $marca->status = $request->status;
        $marca->organismo_id = \Auth::user()->organismo_id;
        $marca->sucursal_id = \Auth::user()->sucursal_id;
        $marca->fecha = date('d/m/Y H:m:s');

        $marca->save();

        if ($marca) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }
   
    }

    public function show($id)
    {
        $marca = TipoReparaciones::find($id);
        $marca->delete();

        $notification = array(
         'message' => '¡Dato eliminado!',
         'alert-type' => 'success'
     );
     
     return \Redirect::back()->with($notification);
    }
}
