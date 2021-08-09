<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.precios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarajax(Request $request)
    {
        $cliente = new Cliente();

        $cliente->name = $request->name;
        $cliente->telefono = $request->telefono;
        $cliente->organismo_id = \Auth::user()->organismo_id;
        $cliente->sucursal_id = \Auth::user()->sucursal_id;

        $cliente->save();
        if ($cliente) {
            
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        $id = $cliente->id;
        $name = $cliente->name;
        $telefono = $cliente->telefono;
        
        return compact('name','id','telefono');  

        }
    }


      public function guardar(Request $request)
    {
        $cliente = new Cliente();

        $cliente->name = $request->name;
        $cliente->telefono = $request->telefono;
        $cliente->organismo_id = \Auth::user()->organismo_id;
        $cliente->sucursal_id = \Auth::user()->sucursal_id;

        $cliente->save();
        if ($cliente) {
            
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
    
        
        return redirect()->back()->with($notification); 

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
