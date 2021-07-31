<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Modulo;
use App\Models\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organismo = new App\Models\Organismos();

        $organismo->nombre_propietario = 'Theizer';
        $organismo->apellido_propietario = 'Gonzalez';
        $organismo->telefono_propietario = '0424123456';
        $organismo->nombre_negocio =  'SERVITEC';
        $organismo->telefono_negocio = '04242112412';
        $organismo->username = 'laradmin';
        $organismo->role_id = 1;

        $organismo->save();


        
        \DB::table('sucursales')->insert([
            'nombre' => 'Caracas',
            'telefono' => '0424123456',
            'direccion' => 'La hoyada',
            'rif' => 'v-2522239',
            'status' => 1,
            'organismo_id' => 1,
            
        ]);

        \DB::table('sucursales')->insert([
            'nombre' => 'La guaira',
            'telefono' => '0424123456',
            'direccion' => 'La guaira',
            'rif' => 'v-2522239',
            'status' => 1,
            'organismo_id' => 1,
            
        ]);


        \DB::table('sucursales')->insert([
            'nombre' => 'Margarita',
            'telefono' => '0424123456',
            'direccion' => 'Margarita',
            'rif' => 'v-2522239',
            'status' => 1,
            'organismo_id' => 1,
            
        ]);

        \DB::table('sucursales')->insert([
            'nombre' => 'Mérida',
            'telefono' => '0424123456',
            'direccion' => 'Mérida',
            'rif' => 'v-2522239',
            'status' => 1,
            'organismo_id' => 1,
            
        ]);

        /*\DB::table('tipo_equipos')->insert([
            'descripcion' => 'SMARTPHONE',
            'status' => 1,
            'organismo_id' => 1,
            'fecha' => date('d/m/Y H:m:s'),
            'sucursal_id' => 1
        ]);

        \DB::table('tipo_equipos')->insert([
            'descripcion' => 'VIDEOJUEGO',
            'status' => 1,
            'organismo_id' => 1,
            'fecha' => date('d/m/Y H:m:s'),
            'sucursal_id' => 1
        ]);

        \DB::table('tipo_equipos')->insert([
            'descripcion' => 'CPU',
            'status' => 1,
            'organismo_id' => 1,
            'fecha' => date('d/m/Y H:m:s'),
            'sucursal_id' => 1
        ]);

        \DB::table('tipo_equipos')->insert([
            'descripcion' => 'CONSOLA VIDEOJUEGO',
            'status' => 1,
            'organismo_id' => 1,
            'fecha' => date('d/m/Y H:m:s'),
            'sucursal_id' => 1
        ]);

        \DB::table('tipo_equipos')->insert([
            'descripcion' => 'TABLET',
            'status' => 1,
            'organismo_id' => 1,
            'fecha' => date('d/m/Y H:m:s'),
            'sucursal_id' => 1
        ]);*/
        
        
        $user = new User;
        $user->name               = 'Theizer';
        $user->lastname           = 'Gonzalez';
        $user->username           = 'laradmin';
        $user->email              = 'admin@mail.com';
        $user->password           = 'admin';
        $user->status             = 1; // (1) active (0)disabled
        $user->organismo_id       = 1;
        $user->sucursal_id        = 1;
        $user->role_id            = 1;
        $user->save();

        $user->assignRole('Super Administrador');


        $user = new User;
        $user->name               = 'Ada';
        $user->lastname           = 'Tovar';
        $user->username           = 'atovar';
        $user->email              = 'atovar@mail.com';
        $user->password           = 'admin';
        $user->status             = 1; // (1) active (0)disabled
        $user->organismo_id       = 1;
        $user->sucursal_id        = 2;
        $user->role_id            = 2; //Lite
        $user->save();

        $user->assignRole('Lite');


        $user = new User;
        $user->name               = 'Carlos';
        $user->lastname           = 'Gonzalez';
        $user->username           = 'cgonzalez';
        $user->email              = 'cgonzalez@mail.com';
        $user->password           = 'admin';
        $user->status             = 1; // (1) active (0)disabled
        $user->organismo_id       = 1;
        $user->sucursal_id        = 3;
        $user->role_id            = 3; //Platinium
        $user->save();

        $user->assignRole('Platinium');


        $user = new User;
        $user->name               = 'Miguel';
        $user->lastname           = 'Gonzalez';
        $user->username           = 'mgonzalez';
        $user->email              = 'mgonzalez@mail.com';
        $user->password           = 'admin';
        $user->status             = 1; // (1) active (0)disabled
        $user->organismo_id       = 1;
        $user->sucursal_id        = 4;
        $user->role_id            = 4; //Premium
        $user->save();

        $user->assignRole('Premium');
    }
}
