<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcas;
use App\Models\TipoEquipos;

class MarcasController extends Controller
{
    public  function index()
    {
        $marcas = Marcas::where('organismo_id',\Auth::user()->organismo_id)
        ->where('sucursal_id',\Auth::user()->sucursal_id)
        ->get();

       
      

        return view ('admin.marcas.index',compact('marcas'));
    }


    public function store(Request $request)
    {   
        
        $marca = new  Marcas();
        $marca->descripcion = $request->descripcion;
        $marca->tipo_equipo_id = $request->tipo_equipo_id;
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


    public function guardarajax(Request $request)
    {   
        
        $marca = new  Marcas();
        $marca->descripcion = $request->descripcion;
        $marca->tipo_equipo_id = $request->tipo_equipo_id;
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
        
        $id = $marca->id;
        $descripcion= $marca->descripcion;

        return compact('id','descripcion');
       }



    }


    public function update(Request $request, $id)
    {   
        //dd($request);
        
        $marca = Marcas::find($id);
        $marca->descripcion = $request->descripcion;
        $marca->tipo_equipo_id = $request->tipo_equipo_id;
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
        $marca = Marcas::find($id);
        $marca->delete();

        $notification = array(
         'message' => '¡Dato eliminado!',
         'alert-type' => 'success'
     );
     
     return \Redirect::back()->with($notification);
    }
}
