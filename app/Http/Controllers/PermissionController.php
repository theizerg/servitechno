<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Log\LogSistema;

class PermissionController extends Controller
{


     public function __construct()
    {
        $this->middleware('permission:VerPermisos')->only('index'); 
        $this->middleware('permission:EditarPermisos')->only('create');
        $this->middleware('permission:VerPermisos')->only('show'); 

    }


    public function index()
    {
        $role = Role::findByName('Usuario');

        //$log = new LogSistema();

        //$log->user_id         = auth()->user()->id;
        // $log->tx_descripcion  = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a ver los permisos del sistema a las: '
        // . date('H:m:i').' del día: '.date('d/m/Y');
        // $log->save();

        return view('admin.permission.index', ['role' => $role]);
    }


    public function show($id)
    {  
        
        $role = Role::findByName($id);
        $permisos = $role->permissions;
        $name = $role->name;
       
        

        // $log = new LogSistema();

        // $log->user_id         = auth()->user()->id;
        // $log->tx_descripcion  = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a ver los permisos del Role: '.$role->name.' a las: '. date('H:m:i').' del día: '.date('d/m/Y');
        // $log->save();

        return view('admin.permission.index',compact('role','name','permisos'));
    }




    public function update(Request $request, $id)
    {
        
        $role = Role::findByName($id);
        
        //dd($request->permissions);

        if(! empty($request->permissions))
        {
            $role->syncPermissions($request->permissions);
        }
        else
        {
            $permissions =  Permission::all();

            foreach ($permissions as $permission)
            {
                $role->revokePermissionTo($permission->name);
            }
        }

       /* $log = new LogSistema();

        $log->user_id         = auth()->user()->id;
        $log->tx_descripcion  = 'El usuario: '.auth()->user()->display_name.' Ha modificado los permisos del Role: '.$role->name.' a las: '. date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();*/

        if ($role <> null) {
            $notification = array(
            'message' => '¡Datos actualizados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('permission/'.$role->name)->with($notification);
    }
    }


}
