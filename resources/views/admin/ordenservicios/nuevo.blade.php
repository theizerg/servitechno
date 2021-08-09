@extends('layouts.admin')
@section('title', 'ORDEN DE SERVICIO')
@section('content')
<div class="content">
  <div class="row">   
    <div class="col-12">
      <div class="card card-line-primary">
        <div class="card-header">
          <h4>Crear nueva orden de servicio</h4>
        </div>
        
        <div class="card-body">
             <div class="btn-group">
            <a href="{{ ('/ordenservicios') }}"  class="btn btn-lg blue darken-4"><i class="mdi mdi-folder mt-2 text-white" ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
                            title="Ver listado de órdendes de servicio.">Listado de órdendes de servicio</small></a>

            <a href="{{ ('/ordenservicios/nuevo') }}"  class="btn btn-lg blue darken-4 disabled"><i class="mdi mdi-plus mt-2 text-white" ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
                            title="Registrar nueva orden de servicio.">Nueva orden de servicio</small></a>
          </div>
            </li>
          </ul><br>
           {!! Form::open(['url' => ['ordenservicios/guardar'],'method' => 'POST','id'=>'main-form']) !!}
            <h3 class="text-center  mt-1 mb-4"><br>
              Datos del cliente
            </h3>
           <div class="row">
            <div class="col-sm-6 form-group ">
              <a href="#createModalCliente" class="btn-link" data-toggle="modal" data-target="#createModalCliente" style="color:green; font-size:20px;">
                <small>
                  <i class="fa fa-plus" aria-hidden="true">
                    Clientes
                  </i>
                </small>
              </a>
            @php
               $clientes = App\Models\Cliente::where('organismo_id',\Auth::user()->organismo_id)
               ->where('sucursal_id', \Auth::user()->sucursal_id)
               ->get()
              @endphp
              <select class="form-control select2" name="cliente_id" id="cliente">
                   <option value="0">-- Selecciona un cliente --</option>
                  @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" >{{ $cliente->name }}</option>

                  @endforeach
              </select>
            </div>
            <div class="col-sm-6 form-group ">
              <label>Teléfono del cliente</label>
              <input type="text" name="telefono" id="telefono_cliente" class="form-control" disabled>
            </div>

           
            </div>
            <h3 class="text-center mt-1 mb-4">
              Datos de identificación del equipo.
            </h3>
            <div class="row">
              <div class="col-sm-4 form-group">
              <label for="txtNombre" class="control-label ">
              <a href="#createModalTipoEquipo" class="btn-link" data-toggle="modal" data-target="#createModalTipoEquipo" style="color:green; font-size:20px;">
                <small>
                  <i class="fa fa-plus" aria-hidden="true">
                    Dispositivos
                  </i>
                </small>
              </a>
            </label><br>
                @php
                 $tipoequipos = App\Models\TipoEquipos::where('organismo_id',\Auth::user()->organismo_id)
                 ->where('sucursal_id', \Auth::user()->sucursal_id)
                 ->pluck('descripcion','id')
                @endphp
                 {!! Form::select('tipo_equipo_id', $tipoequipos, old('tipo_equipo_id'), ['class' => 'form-control select2','placeholder' => 'Seleccione','id'=>'tipoequipos']) !!}
                </div>
                  <div class="col-sm-4 form-group">
                    <label for="txtNombre" class="control-label ">
                  
                  <a href="#createModalMarca" class="btn-link" data-toggle="modal" data-target="#createModalMarca"style="color:green; font-size:20px;">
                    <small>
                      <i class="fa fa-plus" aria-hidden="true">
                        Marcas
                      </i>
                    </small>
                  </a>
               </label><br>
                    <select class="form-control select2 " name="marca_id" id="marcas">
                   </select>
              </div>
              <div class="col-sm-4 form-group">
                 <label for="txtNombre" class="control-label ">
                 
                  <a href="#createModalModelo" class="btn-link" data-toggle="modal" data-target="#createModalModelo"style="color:green; font-size:20px;">
                    <small>
                      <i class="fa fa-plus" aria-hidden="true">
                        Modelos
                      </i>
                    </small>
                  </a>
               </label><br>
                  <select class="form-control select2 " name="modelo_id" id="modelos">
                  </select>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label for="txtNombre" class="control-label ">
                 
                  <a href="#createModalTipoReparacion" class="btn-link" data-toggle="modal" data-target="#createModalTipoReparacion"style="color:green; font-size:20px;">
                    <small>
                      <i class="fa fa-plus" aria-hidden="true">
                        Tipo de reparaciones
                      </i>
                    </small>
                  </a>
               </label><br>
                 @php
                 $tiporeparaciones = App\Models\TipoReparaciones::where('organismo_id',\Auth::user()->organismo_id)
                 ->where('sucursal_id', \Auth::user()->sucursal_id)
                 ->get()
                @endphp
                   <select class="form-control select2 blue" multiple="" name="tipo_reparacion[]" id="tiporeparaciones">
                    @foreach ($tiporeparaciones as $tiporeparacion)
                      <option value="{{ $tiporeparacion->descripcion }}" >{{ $tiporeparacion->descripcion }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label>Descripciones de recepción</label>
                 <textarea name="orservacion_recepcion" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label>Accesorios</label>
                 <textarea name="accesorios" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
              <div class="col-sm-4 form-group mt-3">
              <label>Imei/Serie</label>
              <input type="text" name="imei"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Color</label>
              <input type="text" name="color"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Clave</label>
                   <select class="form-control select2 blue" name="clave">
                      <option value="0" >Seleccione</option>
                      <option value="Ninguna" >Ninguna</option>
                      <option value="Contraseña" >Contraseña</option>
                      <option value="Patrón" >Patrón</option>
                  </select>
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Costo</label>
              <input type="text" name="costo"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Anticipo</label>
              <input type="text" name="anticipo"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Fecha de entrega</label>
              <input type="date" name="fecha_entrega"  class="form-control" >
            </div>
              
            </div><br><br>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-6">
                   <a href="{{ url('ordenservicios') }}" class="btn red darken-4 text-white btn-lg ajax form-control" id="submit">
                    <i id="ajax-icon" class="mdi mdi-cancel"></i> Cancelar orden de servicio
                   </a>
               </div>
               <div class="col-sm-6">
                   <button type="submit" class="btn blue darken-4 text-white btn-lg ajax form-control" id="submit">
                    <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                   </button>
               </div>
              </div>
            </div>
             {!! Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('scripts')

  <script>
$(function () {
   $.validator.setDefaults({
    
  });
  $('#main-form').validate({
    rules: {
      anticipo: {
        required: true,
        
      },
      marca_id: {
        required: true,
       
      },
      modelo_id: {
        required: true
      },
       tipo_reparacion: {
        required: true
      },
      orservacion_recepcion: {
        required: true
      },
       accesorios: {
        required: true
      },
      imei: {
        required: true,
        maxlength:15,
        number: true
      },
       color: {
        required: true
      },
       costo: {
        required: true
      },
    },
    messages: {
      anticipo: {
        required: "Debes ingresar un anticipo",
        anticipo: "Please enter a vaild anticipo address"
      },
      marca_id: {
        required: "Debes seleccionar una marca"
      },
       modelo_id: {
        required: "Debes seleccionar un modelo"
      },
       tipo_reparacion: {
        required: "Debes seleccionar las reparaciones."
      },
        orservacion_recepcion: {
        required: "Debes ingresar la descripción de recepción."
      },
       accesorios: {
        required: "Debes ingresar los accesorios que deja el cliente de equipo."
      },
       imei: {
        required: "Debes ingresar el imei o serie del equipo.",
        maxlength: "Debe tener como máximo 15 caracteres",
        number : "Es un campo numérico"
      },
       color: {
        required: "Debes ingresar el color del equipo."
      },
       clave: {
        required: "Debes ingresar la clase de clave que posee el equipo."
      },
      costo: {
        required: "Debes ingresar el costo del servicio."
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script type="text/javascript" src="{{ asset('js/admin/orden/cliente.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/orden/tipoequipos.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/orden/marcas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/orden/modelos.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/orden/form.js') }}"></script>
@endpush
