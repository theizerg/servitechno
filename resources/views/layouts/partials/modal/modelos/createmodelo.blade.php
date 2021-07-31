<div class="modal fade" id="createModalModelo" tabindex="-1" role="dialog" aria-labelledby="formModal"
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
                {!! Form::model(['route' => ['modelos.store'],'method' => 'POST']) !!}
                  <div class="form-group">
                    <label>Descripción del modelo</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-apple"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Descripción del modelo"
                       name="descripcion">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tipo de equipo</label>
                     <div class="input-group">
                       <div class="input-group-prepend">
                         <div class="input-group-text">
                           <i class="fas fa-lock"></i>
                         </div>
                       </div>
                       @php
                       $marcas =App\Models\Marcas::where('organismo_id',\Auth::user()->organismo_id)
                       ->where('sucursal_id',\Auth::user()->sucursal_id)
                       ->get();
                       @endphp
                       <select name="marca_id" class="form-control">
                         <option value="0" selected>Seleccione la marca del modelo</option>
                         @foreach($marcas as $marca)
                         <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
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
 