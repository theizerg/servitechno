<div class="modal fade" id="createModalMarca" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Agregar marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => ['/marcas/guardarajax'],'method' => 'POST','id'=>'marca']) !!}
                  <div class="col-sm-12">
                    <label>Nombre de la marca</label>
                    <div class="input-group">
                      
                      <input type="text" class="form-control" placeholder="Nombre de la marca"
                       name="descripcion">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <label>Tipo de equipo</label>
                     <div class="input-group">
                      
                       @php
                       $equipos =App\Models\TipoEquipos::where('organismo_id',\Auth::user()->organismo_id)
                       ->where('sucursal_id',\Auth::user()->sucursal_id)
                       ->get();
                       @endphp
                       <select name="tipo_equipo_id" class="form-control select2" data-width="100%">
                         <option value="0" selected>Seleccione el tipo de equipo</option>
                         @foreach($equipos as $equipo)
                         <option value="{{$equipo->id}}">{{$equipo->descripcion}}</option>
                         @endforeach
                       </select>
                     </div>
                   </div>
                  <div class="form-group">
                  <label class="font-weight-bolder" for="status">Estado de la marca</label>
                  <div class="checkbox icheck">
                    <label class="font-weight-bolder">
                      <input type="radio" name="status" value="1" checked> Activa&nbsp;&nbsp;
                      <input type="radio" name="status" value="0"> Deshabilitada
                    </label>
                  </div>
                </div>
                 
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn blue darken-4 form-control" 
                       id="boton">
                          <i class="fas fa-save text-white" id="ajax-icon"></i>
                           <span class="text-white ml-3">{{ __('Guardar') }}</span>
                      </button>
                    </div>
                  </div>
                  {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
 