@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('content') 

    <div class="section-body">
       <div class="row">

      <div class="ml-3 col-md-6">
        <div class="btn-group">
         
          <a  data-toggle="modal" data-target="#usuarioModal" class="btn btn-lg blue darken-4 text-white"><i class="mdi mdi-plus mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Registro de nuevo usuario."></i>Nuevo usuario</a>
         
        </div>
      </div>
    </div><br>
      <div class="row">
        <div class="col-12">
          <div class="card card-line-primary">
            <div class="card-header">
              <h4>Listado de usuarios</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table  table-hover display" id="tableExport" >
                  <thead>
                   <th>#</th>
                    <th>Nombre completo</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Correo electrónico</th>
                    <th>Acceso</th>
                    <th>Opciones</th> 
                  </thead>
               
              <tbody>
                @foreach ($users as $user)
              <tr class="row{{ $user->id }}">
              <td>{{ $user->id }}</td>
              <td>{{ $user->display_name }}</td>
              <td>{{ $user->username }}</td>
                              
             
                <td>{!! $user->hasRole('Super Administrador') ? '<b>Administrador</b>' : 'Usuario' !!}</td>
                <td>{{ $user->email  }}</td>
               <td><span class="badge text-white {{ $user->status ? 'badge-success' : 'badge-danger' }}">{{ $user->display_status }}</span></td>
                <td>
                 @can('VerUsuario')
                 <a class="btn btn-round blue darken-4" data-toggle="tooltip" data-placement="top"
                      title="Ver datos del usuario." href="{{ url('usuarios', [$user->encode_id]) }}"><i class="mdi mdi-face text-center" style="color: white;"></i> </a>
                 @endcan
                @if(Auth::user()->hasrole('Super Administrador') && Auth::user()->id != $user->id)
                 <a  data-toggle="modal" data-target="#updateMarca{{$user->encode_id}} " class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Editar datos del usuario."></i></a>
               @endif
                 
              </td>
              </tr>
              @include('layouts.partials.modal.usuario.editusuario')
              @endforeach   
              </tbody>  
                        
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection

