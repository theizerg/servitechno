<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsTableSeeder extends Seeder
{
       private $permissions ,$user_permissions ,$lite_permissions, $platinium_permissions, $premium_permissions;

 
    public function __construct()
    {
        /*
        set the default permissions
        */
        $this->permissions =  [
                                /* Usuarios */
                                'VerUsuario',
                                'RegistrarUsuario',
                                'EditarUsuario',
                                'EliminarUsuario',

                                /* Organismos */
                                'VerOrganismo',
                                'RegistrarOrganismo',
                                'EditarOrganismo',
                                'EliminarOrganismo',
                                
                                
                                /* Asignar permisos */
                                'AsignarPermisos',                              
                               
                               
                                'VerPermisos',
                                'CrearPermisos',
                                'EditarPermisos',
                                'EliminarPermisos',
                                
                                /* Logins */
                                'VerLogins',
                                'VerLogSistema',

                                /* Roles */
                                'VerRole',
                                'RegistrarRole',
                                'EditarRole',
                                'EliminarRole',

                                /* Reparaciones */
                                'VerReparaciones',
                                'RegistrarReparaciones',
                                'EditarReparaciones',
                                'EliminarReparaciones',

                                /* Punto de Venta */
                                'VerVenta',
                                'RegistrarVenta',
                                'EditarVenta',
                                'EliminarVenta',
                                'VerListaDePrecios',


                                /* Productos */
                                'VerProductos',
                                'RegistrarProductos',
                                'EditarProductos',
                                'EliminarProductos',
                              

                                /* Proveedores */
                                'VerProveedores',
                                'RegistrarProveedores',
                                'EditarProveedores',
                                'EliminarProveedores',

                                 /* Clientes */
                                 'VerClientes',
                                 'RegistrarClientes',
                                 'EditarClientes',
                                 'EliminarClientes',

                                  /* Marcas */
                                 'VerMarca',
                                 'RegistrarMarca',
                                 'EditarMarca',
                                 'EliminarMarca',

                                 /* Modelos */
                                 'VerModelo',
                                 'RegistrarModelo',
                                 'EditarModelo',
                                 'EliminarModelo',

                                /* TipoReparaciones */
                                'VerTipoReparaciones',
                                'RegistrarTipoReparaciones',
                                'EditarTipoReparaciones',
                                'EliminarTipoReparaciones',
                                  
 


                              ];


         $this->lite_permissions = [
                                     /* Reparaciones */
                                     'VerReparaciones',

                                      /* Marcas */
                                     'VerMarca',
                                     'RegistrarMarca',
                                     'EditarMarca',
                                     'EliminarMarca',

                                      /* Modelos */
                                     'VerModelo',
                                     'RegistrarModelo',
                                     'EditarModelo',
                                     'EliminarModelo',

                                    /* TipoReparaciones */
                                    'VerTipoReparaciones',
                                    'RegistrarTipoReparaciones',
                                    'EditarTipoReparaciones',
                                    'EliminarTipoReparaciones',
                                  

                                    ];

         $this->platinium_permissions = [
                                     /* Reparaciones */
                                     'VerReparaciones',
                                     'VerListaDePrecios',

                                      /* Punto de Venta */
                                      'VerVenta',
                                      'RegistrarVenta',
                                      'EditarVenta',
                                      'EliminarVenta',

                                       /* Marcas */
                                     'VerMarca',
                                     'RegistrarMarca',
                                     'EditarMarca',
                                     'EliminarMarca',

                                      /* Modelos */
                                     'VerModelo',
                                     'RegistrarModelo',
                                     'EditarModelo',
                                     'EliminarModelo',

                                    /* TipoReparaciones */
                                    'VerTipoReparaciones',
                                    'RegistrarTipoReparaciones',
                                    'EditarTipoReparaciones',
                                    'EliminarTipoReparaciones',

                                    ];

        $this->premium_permissions = [
                                    
                                    /* Reparaciones */
                                    'VerReparaciones',
                                    'RegistrarReparaciones',
                                    'EditarReparaciones',
                                    'EliminarReparaciones',

                                    /* Punto de Venta */
                                    'VerVenta',
                                    'RegistrarVenta',
                                    'EditarVenta',
                                    'EliminarVenta',
                                    'VerListaDePrecios',


                                    /* Productos */
                                    'VerProductos',
                                    'RegistrarProductos',
                                    'EditarProductos',
                                    'EliminarProductos',
                                  

                                    /* Proveedores */
                                    'VerProveedores',
                                    'RegistrarProveedores',
                                    'EditarProveedores',
                                    'EliminarProveedores',
 
                                    /* Clientes */
                                    'VerClientes',
                                    'RegistrarClientes',
                                    'EditarClientes',
                                    'EliminarClientes', 

                                     /* Marcas */
                                     'VerMarca',
                                     'RegistrarMarca',
                                     'EditarMarca',
                                     'EliminarMarca',

                                      /* Modelos */
                                     'VerModelo',
                                     'RegistrarModelo',
                                     'EditarModelo',
                                     'EliminarModelo',

                                    /* TipoReparaciones */
                                    'VerTipoReparaciones',
                                    'RegistrarTipoReparaciones',
                                    'EditarTipoReparaciones',
                                    'EliminarTipoReparaciones',
                                   

                                    ];
    }

    public function run()
      {
          // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'Super Administrador']);
        $role->givePermissionTo($this->permissions);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'Lite']);
        $role->givePermissionTo($this->lite_permissions);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'Platinium']);
        $role->givePermissionTo($this->platinium_permissions);

         // create the user role and set all user permissions
        $role = Role::create(['name' => 'Premium']);
        $role->givePermissionTo($this->premium_permissions);

    }
}
