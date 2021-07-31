<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

  



    public function index(Request $request)
    {
        $roles = Role::get();
        $users = User::with('roles')->with('permissions')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);

        return view('admin.usuarios.index',compact('users','roles'));
    }




    public function create()
    {
        return view('admin.usuarios.create');
    }




    public function store(Request $request)
    {

        

        $usuario = new User();
        
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->username = $request->username;
        $usuario->status = $request->status;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->organismo_id = \Auth::user()->organismo_id;
        $usuario->sucursal_id = \Auth::user()->sucursal_id;

        $usuario->save();
        

        if ($usuario) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );

        if ($request->has('role'))
        {
            $usuario->assignRole($request->role);
        }

         $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
        }

         
    }




    public function show($id)
    {
        $user = User::find(\Hashids::decode($id)[0]);

        return view('admin.usuarios.show', ['user' => $user]);
    }




    public function edit($id)
    {
        $user = User::find(\Hashids::decode($id)[0]);

        return view('admin.usuarios.edit', ['user' => $user]);
    }




    public function update(Request $request, $id)
    {
        $usuario = User::find(\Hashids::decode($id)[0]);
        
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->username = $request->username;
        $usuario->status = $request->status;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->organismo_id = \Auth::user()->organismo_id;
        $usuario->sucursal_id = \Auth::user()->sucursal_id;

        $usuario->save();

      if ($usuario) {
          
            if ($request->has('role'))
        {
            $usuario->syncRoles($request->role);
        }

        $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
      }


    }




    public function destroy($id)
    {
        $user = User::find(\Hashids::decode($id)[0])->delete();

        return json_encode(['success' => true]);
    }



    public function autocomplete(Request $request)
    {
        return User::search($request->q)->take(10)->get();
    }
}
