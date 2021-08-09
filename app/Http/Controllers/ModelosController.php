<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelos;
class ModelosController extends Controller
{
    public  function index()
    {
        $marcas = Modelos::where('organismo_id',\Auth::user()->organismo_id)
        ->where('sucursal_id',\Auth::user()->sucursal_id)
        ->get();

       
      

        return view ('admin.modelos.index',compact('marcas'));
    }


    public function store(Request $request)
    {   
        
        $modelo = new  Modelos();
        $modelo->descripcion = $request->descripcion;
        $modelo->marca_id = $request->marca_id;
        $modelo->status = $request->status;
        $modelo->organismo_id = \Auth::user()->organismo_id;
        $modelo->sucursal_id = \Auth::user()->sucursal_id;
        $modelo->fecha = date('d/m/Y H:m:s');

        $modelo->save();

       
        if ($modelo) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }



    }


     public function guardarajax(Request $request)
    {   
        
        $modelo = new  Modelos();
        $modelo->descripcion = $request->descripcion;
        $modelo->marca_id = $request->marca_id;
        $modelo->status = $request->status;
        $modelo->organismo_id = \Auth::user()->organismo_id;
        $modelo->sucursal_id = \Auth::user()->sucursal_id;
        $modelo->fecha = date('d/m/Y H:m:s');

        $modelo->save();

       
        if ($modelo) {
          


        $id = $modelo->id;
        $descripcion = $modelo->descripcion;

        return compact('id','descripcion');
       }



    }


    public function update(Request $request, $id)
    {   
        //dd($request);
        
        $modelo = Modelos::find($id);
        $modelo->descripcion = $request->descripcion;
        $modelo->marca_id = $request->marca_id;
        $modelo->status = $request->status;
        $modelo->organismo_id = \Auth::user()->organismo_id;
        $modelo->sucursal_id = \Auth::user()->sucursal_id;
        $modelo->fecha = date('d/m/Y H:m:s');

        $modelo->save();

        if ($modelo) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }
   
    }

    public function show($id)
    {
        $modelo = Modelos::find($id);
        $modelo->delete();

        $notification = array(
         'message' => '¡Dato eliminado!',
         'alert-type' => 'success'
     );
     
     return \Redirect::back()->with($notification);
    }
}
