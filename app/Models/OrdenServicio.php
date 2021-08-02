<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    







     public function getDisplayStatusAttribute()
    {
        return $this->estado_servicio_id == 1 ? 'POR REPARAR' : '';
    }


     public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }


     public function equipos()
    {
        return $this->belongsTo(TipoEquipos::class,'tipo_equipo_id');
    }


    public function marca()
    {
        return $this->belongsTo(Marcas::class,'marca_id');
    }


    public function modelo()
    {
        return $this->belongsTo(Modelos::class,'modelo_id');
    }


    public function estado()
    {
        return $this->belongsTo(EstadoServicio::class,'estado_servicio_id');
    }
}
