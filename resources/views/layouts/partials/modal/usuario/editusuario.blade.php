<div class="modal fade" id="updateMarca{{$user->encode_id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modificar datos del Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!! Form::model($user, ['route' => ['usuarios.update',$user->encode_id],'method' => 'PUT']) !!}
            <div class="box-body">
              <div class="form-group pading">
                <label for="name">Nombres</label>
                <input id="name" type="name" class="form-control" name="name" value="{{ $user->name }}"  autocomplete="name" autofocus placeholder="Usuario">
                 
              </div>
              <div class="form-group">
                <label for="last_name">Apellidos</label>
                 <input id="lastname" type="lastname" class="form-control" name="lastname" value="{{ $user->lastname }}"  autocomplete="lastname" autofocus placeholder="Usuario">
                
              </div>
              
              <div class="form-group">
                <label for="last_name">Usuario</label>
                 <input id="username" type="username" class="form-control" name="username" value="{{ $user->username }}"  autocomplete="username" autofocus placeholder="Usuario">
                 
              </div>
              <div class="form-group">
                <label for="email">Correo Electrónico</label>
                 <input id="email" type="email" class="form-control "name="email" value="{{ $user->email }}"  autocomplete="email" autofocus placeholder="Contraseña">
                 
              </div>
             
              <div class="form-group">
                <label for="password">Nueva Contraseña</label>
               <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}"  autocomplete="password" autofocus placeholder="Contraseña">
                 
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                 <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}"  autocomplete="password_confirmation" autofocus placeholder="Contraseña">
                 
              </div>
              @if(Auth::user()->hasrole('Super Administrador') && Auth::user()->id != $user->id)
              <div class="form-group">
                <label for="status">Acceso al sistema</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status" value="1" {{ $user->status == 1 ? 'checked' : '' }}> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" {{ $user->status == 0 ? 'checked' : '' }}> Deshabilitado&nbsp;&nbsp;
                  </label>
                </div>
              </div>
              @endif
              <br>
              
              <div class="box-footer">
              <button type="submit" class="btn blue darken-4 text-white  ajax" id="submit">
                <i id="ajax-icon" class="fa fa-edit"></i> Editar
              </button>
            </div>
          </div>
 {!! Form::close()!!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@push('scripts')
  
    <script>
      $(document).ready(function (){
      var fechaEmision = new Date();
      var day = ("0" + fechaEmision.getDate()).slice(-2);
      var month = ("0" + (fechaEmision.getMonth() + 1)).slice(-2);
      fecha = fechaEmision.getFullYear()+"-"+(month)+"-"+(day);
      $("#fecha").val(fecha);
           });
      </script>
@endpush