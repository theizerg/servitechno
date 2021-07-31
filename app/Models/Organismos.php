<?php

namespace App\Models;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Eloquent\Model;

class Organismos extends Model
{
    

 /*
    |
    | ** Accesors model **
    |
    */

     public function getDisplayNameAttribute()
     {
         return trim(str_replace( '  ', ' ',  "{$this->nombre_propietario} {$this->apellido_propietario}")) ;
     }


    public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Activo' : 'Denegado';
    }


     public function roles()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
}
