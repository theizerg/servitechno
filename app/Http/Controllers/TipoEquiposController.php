<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEquipos;

class TipoEquiposController extends Controller
{
    public  function index()
    {
        $reparacionestipo = TipoEquipos::where('organismo_id',\Auth::user()->organismo_id)
        ->where('sucursal_id',\Auth::user()->sucursal_id)
        ->get();


        return view ('admin.tipoequipos.index',compact('reparacionestipo'));
    }


    public function store(Request $request)
    {   
        
        $marca = new  TipoEquipos();
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
        
        $marca = TipoEquipos::find($id);
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
        $marca = TipoEquipos::find($id);
        $marca->delete();

        $notification = array(
         'message' => '¡Dato eliminado!',
         'alert-type' => 'success'
     );
     
     return \Redirect::back()->with($notification);
    }
}
