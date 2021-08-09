<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organismos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $role = \Auth::user()->roles;

        foreach ($role as $key => $value) {
            
            
        }

       if (\Auth::user()->hasRole($value->name)) {
           return view('admin.home.index');
       }
       else{
        $organismo = Organismos::find(\Auth::user()->organismo_id);
        return view('admin.home.index',compact('organismo') );
       }
    }
}
