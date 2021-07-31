<?php

namespace App\Http\Controllers;

use App\Models\ListaDePrecio;
use Illuminate\Http\Request;

class ListaDePrecioController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListaDePrecio  $listaDePrecio
     * @return \Illuminate\Http\Response
     */
    public function show(ListaDePrecio $listaDePrecio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListaDePrecio  $listaDePrecio
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaDePrecio $listaDePrecio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListaDePrecio  $listaDePrecio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaDePrecio $listaDePrecio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListaDePrecio  $listaDePrecio
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListaDePrecio $listaDePrecio)
    {
        //
    }
}
