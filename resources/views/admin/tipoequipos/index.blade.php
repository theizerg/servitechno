@extends('layouts.admin')
@section('title', 'Tipo de equipos')
@section('content')
<div class="row">
  <div class="ml-3 col-md-6">
    <div class="btn-group">
        <button type="button" class="btn btn-primary blue darken-4 mb-4"
        data-toggle="modal" data-target="#createModalTipoEquipo">
        <i class="fa fa-plus-square"></i> Nuevo Registro </button>
      </div><br>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Tipo de equipos</h4>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
              <thead>
                <tr>
                  <th>Descripción</th>
                  <th>Fecha de ingreso</th>
                  <th>Estado de la marca</th>
                  <th>Organismo - Sucursal</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reparacionestipo as $reparaciontipo)
                    
               
                <tr>
                  
                  <td>{{ $reparaciontipo->descripcion }}</td>
                  <td>{{ $reparaciontipo->fecha }}</td>
                  <td><span class="badge text-white {{ $reparaciontipo->status ? 'badge-success' : 'badge-danger' }}">{{ $reparaciontipo->display_status }}</span></td>
                  
                  <td>{{ $reparaciontipo->organismo->nombre_negocio }} - {{ $reparaciontipo->sucursal->nombre}}</td>
                  <td><a  data-toggle="modal" data-target="#updateTipoE{{ $reparaciontipo->id }}" class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Editar datos del organismo."></i></a>
                <a href="{{url('/tipoequipos/'.$reparaciontipo->id)}} " class="btn btn-round red darken-4"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Eliminar dato del organismo."></i></a>

                </td>
              </tr>
               @include('layouts.partials.modal.tipoequipo.edittipoequipo')
              @endforeach
            </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
