@extends('layouts.admin')
@section('title', 'Modelos')
@section('content')
<div class="row">
  <div class="ml-3 col-md-6">
    <div class="btn-group">
      <button type="button" class="btn btn-primary blue darken-4 mb-4"
       data-toggle="modal" data-target="#createModalModelo">
       <i class="fa fa-plus-square"></i> Agregar modelo </button>
    </div><br>
  </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Listado de modelos</h4>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
              <thead>
                <tr>
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th>Fecha de ingreso</th>
                  <th>Estado de la marca</th>
                  <th>Ornanismo - Sucursal</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($marcas as $marca)
                    
               
                <tr>
                  
                  <td>{{ $marca->descripcion }}</td>
                  <td>{{ $marca->marca->descripcion }}</td>
                  <td>{{ $marca->fecha }}</td>
                  <td><span class="badge text-white {{ $marca->status ? 'badge-success' : 'badge-danger' }}">{{ $marca->display_status }}</span></td>
                  
                  <td>{{ $marca->organismo->nombre_negocio }} - {{ $marca->sucursal->nombre}}</td>
                  <td><a  data-toggle="modal" data-target="#updateModelo{{$marca->id}} " class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Editar datos del organismo."></i></a>
                <a href="{{url('/modelos/'.$marca->id)}} " class="btn btn-round red darken-4"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Eliminar dato del organismo."></i></a>

                </td>
              </tr>
               @include('layouts.partials.modal.modelos.editmodelo')
              @endforeach
            </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
