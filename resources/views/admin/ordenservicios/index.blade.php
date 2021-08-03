@extends('layouts.admin')
@section('title', 'ORDEN DE SERVICIO')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-line-primary">
        <div class="card-header">
          <h4>Listado de equipos no reparados</h4>
        </div>
        
        <div class="card-body">
          <div class="btn-group">
            <a href="{{ ('/ordenservicios/nuevo') }}"  class="btn btn-lg blue darken-4"><i class="mdi mdi-plus mt-2 text-white" ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
                            title="Registrar nueva orden de servicio.">Nueva orden de servicio</small></a>
          </div>
          <div class="table-responsive mt-5">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
              <thead>
                <tr>
                  <th class="text-uppercase" >FOLIO</th>
                  <th class="text-uppercase" >CLIENTE - TELÉFONO</th>
                  <th class="text-uppercase" >Tipo de equipo</th>
                  <th class="text-uppercase" >MARCA - MODELO</th>
                  <th class="text-uppercase" >ESTADO DEL EQUIPO</th>
                  <th class="text-uppercase" >Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ordenes as $orden)
                    
               
                <tr>
                  
                  <td>00000{{ $orden->id }}</td>
                  <td>{{ $orden->cliente->name }} - {{ $orden->cliente->telefono }}</td>
                  <td>{{ $orden->equipos->descripcion }}</td>
                  <td>{{ $orden->marca->descripcion }} - {{ $orden->modelo->descripcion }}</td>
                  <td><span class="badge text-white {{ $orden->estado_servicio_id ? 'badge-success' : 'badge-info' }}">{{ $orden->estado->descripcion }}</span></td>
                  <td>


                    <a  data-toggle="modal" data-target="#updateOrdenServicio{{$orden->id}} " class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Editar datos de la orden de servicio."></i></a>
                    
                    <a href="{{url('/ordenservicios/historial',[$orden->id])}} " class="btn btn-round green darken-4"><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Ver historial del equipo."></i></a>
                

                </td>
              </tr>
              @include('layouts.partials.modal.ordenservicio.editorden')
              @endforeach
            </tbody>
              
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
