@extends('layouts.admin')
@section('title', '')
@section('content')
<div class="row">
  <div class="ml-3 col-md-6">
    <div class="btn-group">
      <a  href="{{ url('ordenservicios') }}" class="btn btn-round blue darken-4"><i class="mdi mdi-plus mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Registrar nueva orden de servicio."></i></a>
    </div><br><br>
  </div>
    <div class="col-12">
      <div class="card card-line-primary">
        <div class="card-header">
          <h4>Listado de equipos no reparados</h4>
        </div>
        
        <div class="card-body">
          <div class="btn-group  ">
              <a href="{{ ('/ordenservicios/reparar') }}" class="btn btn-lg blue darken-4 text-white text-center ">Equipos por reparar</a>
              <a href="{{ ('/ordenservicios/revisado') }}" class="btn btn-lg blue darken-4 text-white text-center  ">Equipos revisados</a>
              <a href="{{ ('/ordenservicios/reparados') }}" class="btn btn-lg blue darken-4 text-white ">Equipos reparados</a>
              <a href="{{ ('/ordenservicios/noreparados') }}" class="btn btn-lg blue darken-4 text-white ">Equipos  no reparados</a>
              <a href="{{ ('/ordenservicios/reincidencias') }}" class="btn btn-lg blue darken-4 text-white">Reincidencias</a>
               <a href="{{ ('/ordenservicios/entregados') }}" class="btn btn-lg blue darken-4 text-white disabled">Equipos entregados</a>
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
                  <td><a href="{{url('/ordenservicios/historial',[$orden->id])}} " class="btn btn-round green darken-4"><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
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