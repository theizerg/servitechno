@extends('layouts.admin')
@section('title', 'Orden de servicio')
@section('content')
<div class="container">
	<div class="row">
	     <div class="col-12">
	      <div class="card card-line-primary">
	        <div class="card-header">
	          <h4>Registrar nueva orden de servicio</h4>
	        </div>
	        
	        <div class="card-body">
	        	 <div class="btn-group  ">
              <a href="{{ ('/ordenservicios/reparar') }}" class="btn btn-lg blue darken-4 text-white text-center ">Equipos por reparar</a>
              <a href="{{ ('/ordenservicios/revisado') }}" class="btn btn-lg blue darken-4 text-white text-center  ">Equipos revisados</a>
              <a href="{{ ('/ordenservicios/reparados') }}" class="btn btn-lg blue darken-4 text-white ">Equipos reparados</a>
              <a href="{{ ('/ordenservicios/noreparados') }}" class="btn btn-lg blue darken-4 text-white ">Equipos  no reparados</a>
              <a href="{{ ('/ordenservicios/reincidencias') }}" class="btn btn-lg blue darken-4 text-white">Reincidencias</a>
               <a href="{{ ('/ordenservicios/entregados') }}" class="btn btn-lg blue darken-4 text-white ">Equipos entregados</a>
            </div>
			{!! Form::open(['url' => ['ordenservicios/guardar'],'method' => 'POST','id'=>'main-form']) !!}
	        	<h3 class="text-center"><br>
	        		Datos del cliente
	        	</h3>
	         <div class="row">
	         	<div class="col-sm-6">
	         	<label>Cliente</label>
	         	 @php
	         	     $clientes = App\Models\Cliente::where('organismo_id',\Auth::user()->organismo_id)
    		         ->where('sucursal_id', \Auth::user()->sucursal_id)
    		         ->get()
	              @endphp
                   <select class="form-control " name="cliente_id" id="cliente">

                   	@foreach ($clientes as $cliente)
                   		<option value="{{ $cliente->id }}" >{{ $cliente->name }}</option>
                   	@endforeach
                  </select>
	         	</div>
	         	<div class="col-sm-6">
	         		<label>Teléfono del cliente</label>
	         		<input type="text" name="telefono" id="telefono_cliente" class="form-control" disabled>
	         	</div>
	          </div>
	          <h3 class="text-center mt-5">
	        		Datos de identificación del equipo.
	          </h3>
	          <div class="row">
	          	<div class="col-sm-4 form-group">
							<label>Dipositivos</label>
								@php
	         	     $tipoequipos = App\Models\TipoEquipos::where('organismo_id',\Auth::user()->organismo_id)
    		         ->where('sucursal_id', \Auth::user()->sucursal_id)
    		         ->get()
	              @endphp
                 <select class="form-control  " name="tipo_equipo_id" id="tipoequipos">
                 		<option value="0" >Seleccione</option>
                 	@foreach ($tipoequipos as $tipoequipo)
                 		<option value="{{ $tipoequipo->id }}" >{{ $tipoequipo->descripcion }}</option>
                 	@endforeach
                </select>
	            	</div>
	              	<div class="col-sm-4 form-group">
								   <label>Marcas</label>
                    <select class="form-control " name="marca_id" id="marcas">
                   </select>
	          	</div>
	          	<div class="col-sm-4 form-group">
	         	    <label>Modelos</label>
                  <select class="form-control " name="modelo_id" id="modelos">
							    </select>
	          	</div>
	          	<div class="col-sm-4 form-group mt-4">
	         			<label>Tipo de reparaciones</label>
	         	     @php
	         	     $tipoequipos = App\Models\TipoReparaciones::where('organismo_id',\Auth::user()->organismo_id)
    		         ->where('sucursal_id', \Auth::user()->sucursal_id)
    		         ->get()
	              @endphp
                   <select class="form-control select2 blue" multiple="" name="tipo_reparacion[]" id="tiporeparaciones">
                   	@foreach ($tipoequipos as $tipoequipo)
                   		<option value="{{ $tipoequipo->descripcion }}" >{{ $tipoequipo->descripcion }}</option>
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
	          </div>
	          <div class="">
                <button type="submit" class="btn blue darken-4 text-white btn-lg ajax" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
               
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
		  // Select2
 
    $(".select2").select2();

	</script>
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

	</script>
	<script type="text/javascript" src="{{ 'js/admin/orden/form.js' }}"></script>
@endpush
