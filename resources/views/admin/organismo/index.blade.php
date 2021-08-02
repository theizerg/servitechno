@extends('layouts.admin')
@section('title', 'Organismo')
@section('content')
<div class="row">
  <div class="ml-3 col-md-6">
    <div class="btn-group">
      <button type="button" class="btn btn-primary blue darken-4 mb-4" data-toggle="modal" data-target="#createModalOrganismo"><i class="fa fa-plus-square"></i> Agregar organismo </button>
    </div><br>
  </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Listado de organismo</h4>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
              <thead>
                <tr>
                  <th>Nombres del propietario</th>
                  <th>Teléfono del propietario</th>
                  <th>Nombre del negocio</th>
                  <th>Teléfono del negocio</th>
                  <th>Role designado</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($organismos as $organismo)
                    
               
                <tr>
                  
                  <td>{{ $organismo->display_name }}</td>
                  <td>{{ $organismo->telefono_propietario }}</td>
                  <td>{{ $organismo->nombre_negocio }}</td>
                  <td>{{ $organismo->telefono_negocio }}</td>
                  <td>{{ $organismo->roles->name }}</td>
                  <td><a  data-toggle="modal" data-target="#updateOrganismo{{$organismo->id}} " class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Editar datos del organismo."></i></a>
                  <a href="{{url('/organismos/'.$organismo->id)}} " class="btn btn-round red darken-4"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Eliminar dato del organismo."></i></a>

                  </td>
                </tr>
                 @include('layouts.partials.modal.organismo.modalorganismoupdate')
                @endforeach
              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
