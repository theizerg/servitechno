<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Crear Menú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <form id="main-form" autocomplete="off"><br>
                  <input type="hidden" id="_url" value="{{ url('menu') }}">
                  <input type="hidden" id="_redirect" value="{{ url('/') }}">
                  <input type="hidden" id="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label>Nombre del menú</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user-tie"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Nombre del menú" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                   <label>Link</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-link"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Link" name="link">
                    </div>
                  </div>
                  <div class="form-group">
                   <label>Icono</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-folder"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="ejemplo: fas fa-user" name="icono">
                    </div>
                  </div>
                  <div class="form-group">
                   <label>Módulo que pertenece el menú</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </div>
                      </div>
                      @php
                      $modulos =App\Models\Modulo::get();
                      @endphp
                      <select name="modulo_id" class="form-control">
                        <option value="0" selected>Seleccione el módulo</option>
                        @foreach($modulos as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                   <label>Role que pertenecerá el menú</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </div>
                      </div>
                      @php
                      $roles =Spatie\Permission\Models\Role::get();
                      @endphp
                      <select name="role_id" class="form-control">
                        <option value="0" selected>Seleccione el role</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn blue darken-4 form-control" id="boton">
                          <i class="fas fa-save text-white" id="ajax-icon"></i>
                           <span class="text-white ml-3">{{ __('Guardar') }}</span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    @push('scripts')
    <script src="{{ asset('js/admin/menu/create.js') }}"></script>
@endpush
