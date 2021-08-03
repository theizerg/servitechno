<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Models\Organismos;
use App\Models\User;
use Illuminate\Http\Request;

class OrganismosController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:VerRole')->only('index'); 
        $this->middleware('permission:RegistrarRole')->only('create');
        $this->middleware('permission:RegistrarRole')->only('store');
        $this->middleware('permission:EditarRole')->only('edit');
        $this->middleware('permission:EditarRole')->only('update');
        $this->middleware('permission:VerRole')->only('show'); 

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $organismos = Organismos::get();
        return view('admin.organismo.index',compact('organismos'));
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
        //dd($request);
         $organismos = new Organismos();

         $organismos->nombre_propietario = $request->nombre_propietario;
         $organismos->apellido_propietario = $request->apellido_propietario;
         $organismos->telefono_propietario = $request->telefono_propietario;
         $organismos->nombre_negocio = $request->nombre_negocio;
         $organismos->telefono_negocio = $request->telefono_negocio;
         $organismos->username = $request->username;
         $organismos->status = $request->status;
         $organismos->role_id = $request->role_id;


        $organismos->save();


         $user = new User();

         $user->name = $request->nombre_propietario;
         $user->lastname = $request->apellido_propietario;
         $user->username = $request->username;
         $user->status = $request->status;
         $user->email = $request->username.'@mail.com';
         $user->password = $request->password;
         $user->organismo_id = $organismos->id;
         $user->role_id = $request->role_id;

         if ($request->has('role_id'))
        {   
            $role = Role::findById($request->role_id);
           
            $user->syncRoles($role->name);
        }

        $user->save();

        return \Redirect::to('organismos');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organismos  $organismos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organismo = Organismos::find($id);
        $organismo->delete();

        return \Redirect::to('organismos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organismos  $organismos
     * @return \Illuminate\Http\Response
     */
    public function edit(Organismos $organismos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organismos  $organismos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $organismos = Organismos::find($id);


         $organismos->nombre_propietario = $organismos->nombre_propietario;
         $organismos->apellido_propietario = $organismos->apellido_propietario;
         $organismos->telefono_propietario = $organismos->telefono_propietario;
         $organismos->nombre_negocio = $organismos->nombre_negocio;
         $organismos->telefono_negocio = $organismos->telefono_negocio;
         $organismos->username = $organismos->username;
         $organismos->status = $organismos->status;
         $organismos->role_id = $organismos->role_id;
         $organismos->direccion = $request->direccion;
         $organismos->razon_social = $request->razon_social;
         $organismos->correo = $request->correo;
         $organismos->nom_director = $request->nom_director;
         $organismos->rfc = $request->rfc;
         $organismos->cp = $request->cp;

          //guardar imagen
        $file = $request->file('photo');
        //dd($file);
        $path = public_path() . '/images/organismo/logo';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);
        $organismos->photo = $fileName;

        $user = User::find($id);

         $user->name = $organismos->nombre_propietario;
         $user->lastname = $organismos->apellido_propietario;
         $user->username = $user->username;
         $user->status = $user->status;
         $user->email = $request->correo;
         $user->password = $user->password;
         $user->organismo_id = $organismos->id; 
         $user->role_id = $user->role_id; 


        if ($request->has('role_id'))
        {   
            $role = Role::findById($request->has('role_id'));

            $user->syncRoles($role->name);
        }

        $organismos->save();
        $user->save();

        return \Redirect::to('organismos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organismos  $organismos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organismos $organismos)
    {
        //
    }
}
