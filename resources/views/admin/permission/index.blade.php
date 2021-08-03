@extends('layouts.admin')

@section('title', 'Permisos')
@section('page_title', 'Permisos')


@section('content')

   <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Permisos del rol</h2> <h3 class="float-right ml-4">({{$role->name}})</h3>
                <div class="card-tools"></div>
              </div>
              <div class="card-body table-responsive table-striped">
                {!! Form::model($role, ['route' => ['permission.update',$role->name],'method' => 'PUT']) !!}
                  <table class="table table-responsive">
                   
                    <tr>
                      <td>
                        Ver usuarios<br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerUsuario" {{ $role->hasPermissionTo('VerUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarUsuario" {{ $role->hasPermissionTo('RegistrarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarUsuario" {{ $role->hasPermissionTo('EditarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarUsuario" {{ $role->hasPermissionTo('EliminarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver logins</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerLogins" {{ $role->hasPermissionTo('VerLogins') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    
                      <td>
                        Asignar permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AsignarPermisos" {{ $role->hasPermissionTo('AsignarPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver Permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerPermisos" {{ $role->hasPermissionTo('VerPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                       <td>
                        Registrar Permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearPermisos" {{ $role->hasPermissionTo('CrearPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar Permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarPermisos" {{ $role->hasPermissionTo('EditarPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar Permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarPermisos" {{ $role->hasPermissionTo('EliminarPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Log del sistema</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerLogSistema" {{ $role->hasPermissionTo('VerLogSistema') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerRole" {{ $role->hasPermissionTo('VerRole') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Registrar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarRole" {{ $role->hasPermissionTo('RegistrarRole') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarRole" {{ $role->hasPermissionTo('EditarRole') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                       <td>
                        Eliminar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarRole" {{ $role->hasPermissionTo('EliminarRole') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Reparaciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerReparaciones" {{ $role->hasPermissionTo('VerReparaciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Registrar Reparaciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarReparaciones" {{ $role->hasPermissionTo('RegistrarReparaciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar Reparaciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarReparaciones" {{ $role->hasPermissionTo('EditarReparaciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar Reparaciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarReparaciones" {{ $role->hasPermissionTo('EliminarReparaciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Ventas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerVenta" {{ $role->hasPermissionTo('VerVenta') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Registrar Ventas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarVenta" {{ $role->hasPermissionTo('RegistrarVenta') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Editar Ventas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarVenta" {{ $role->hasPermissionTo('EditarVenta') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar Ventas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarVenta" {{ $role->hasPermissionTo('EliminarVenta') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Lista de precios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerListaDePrecios" {{ $role->hasPermissionTo('VerListaDePrecios') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Productos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerProductos" {{ $role->hasPermissionTo('VerProductos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Registrar Productos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarProductos" {{ $role->hasPermissionTo('RegistrarProductos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar Productos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarProductos" {{ $role->hasPermissionTo('EditarProductos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar Productos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarProductos" {{ $role->hasPermissionTo('EliminarProductos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                       <td>
                        Ver Proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerProveedores" {{ $role->hasPermissionTo('VerProveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Registrar Proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarProveedores" {{ $role->hasPermissionTo('RegistrarProveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar Proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarProveedores" {{ $role->hasPermissionTo('EditarProveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar Proveedores</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarProveedores" {{ $role->hasPermissionTo('EliminarProveedores') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver Clientes</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerClientes" {{ $role->hasPermissionTo('VerClientes') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Registrar Clientes</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarClientes" {{ $role->hasPermissionTo('RegistrarClientes') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar Clientes</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarClientes" {{ $role->hasPermissionTo('EditarClientes') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                       <td>
                        Ver Marcas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerMarca" {{ $role->hasPermissionTo('VerMarca') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Registrar Marcas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarMarca" {{ $role->hasPermissionTo('RegistrarMarca') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar Marcas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarMarca" {{ $role->hasPermissionTo('EditarMarca') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar Marcas</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarMarca" {{ $role->hasPermissionTo('EliminarMarca') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver Modelos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerModelo" {{ $role->hasPermissionTo('VerModelo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Registrar Modelos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarModelo" {{ $role->hasPermissionTo('RegistrarModelo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar Modelos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarModelo" {{ $role->hasPermissionTo('EditarModelo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Eliminar Modelos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarModelo" {{ $role->hasPermissionTo('EliminarModelo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Tipo de reparaciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerTipoReparaciones" {{ $role->hasPermissionTo('VerTipoReparaciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Registrar Tipo de reparaciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarTipoReparaciones" {{ $role->hasPermissionTo('RegistrarTipoReparaciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar Tipo de reparaciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarTipoReparaciones" {{ $role->hasPermissionTo('EditarTipoReparaciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar Tipo de reparaciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarTipoReparaciones" {{ $role->hasPermissionTo('EliminarTipoReparaciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarCaja" {{ $role->hasPermissionTo('RegistrarCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Registrar Caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarCaja" {{ $role->hasPermissionTo('RegistrarCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Editar Caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarCaja" {{ $role->hasPermissionTo('EditarCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar Caja</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarCaja" {{ $role->hasPermissionTo('EliminarCaja') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                  </table>
                  <div class="card-footer clearfix"></div>
                    <button type="submit" class="btn blue darken-4 text-white ajax form-control" id="submit">
                      <i id="ajax-icon" class="fa fa-edit"></i> Editar
                    </button>
                  </div>
                </form>
            </div>
          </div>
      </div>
    </section>



@endsection
@push('scripts')
 
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
   
  <script src="{{ asset('js/admin/permission/index.js') }}"></script>
@endpush
