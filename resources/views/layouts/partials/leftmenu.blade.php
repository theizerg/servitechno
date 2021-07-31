<ul class="sidebar-menu">
 <li class="menu-header">Opciones generales</li>
<li class="dropdown ">
  <a href="{{url('/')}}" class="nav-link"><i data-feather="home"></i><span>Inicio</span></a>
</li>
 <li class="dropdown show active">
  @can('VerUsuario')
  <a href="#" class="menu-toggle nav-link has-dropdown"><i
      data-feather="settings"></i><span>Administración</span></a>
     
     <ul class="dropdown-menu">
      <li class="dropdown">
        <a href="#" class="has-dropdown"><i class="fas fa-user"></i>Usuarios</a>
        @can('VerUsuario')
        <ul class="dropdown-menu">
          <li><a href="{{url('usuarios')}}"><i class="fas fa-list"></i>Ver listado</a></li>
        </ul>
        @endcan
     </li>
  </ul>
   @endcan
    @can('VerRole')
      <ul class="dropdown-menu">
        <li class="dropdown">
          <a href="#" class="has-dropdown"><i class="fas fa-user-lock"></i>Roles</a>
          <ul class="dropdown-menu">
            @can('VerRole')
            <li>
              <a href="{{url('/roles')}}"><i class="fas fa-list"></i>Ver listado</a>
            </li>
            @endcan
            @can('RegistrarRole')
            <li>
              <a href="{{url('/roles/create')}}"><i class="fas fa-plus-square"></i>Nuevo Role</a>
            </li>
            @endcan
          </ul>
      </li>
    </ul>
    @endcan
    @can('VerOrganismo')
      <ul class="dropdown-menu">
        <li class="dropdown">
          <a href="#" class="has-dropdown"><i class="fas fa-building"></i>Organismos</a>
          <ul class="dropdown-menu">
            @can('VerOrganismo')
            <li>
              <a href="{{url('/organismos')}}"><i class="fas fa-list"></i>Ver listado</a>
            </li>
            @endcan
          </ul>
      </li>
    </ul>
    @endcan
  </li>
  <li class="dropdown show active">
  <a href="#" class="menu-toggle nav-link has-dropdown"><i
      data-feather="settings"></i><span>Registros principales</span></a>
    @can('VerMarca')
    <ul class="dropdown-menu">
      <li class="dropdown">
        <a href="#" class="has-dropdown"><i class="mdi mdi-phone-classic"></i>Tipo de equipos</a>
        <ul class="dropdown-menu">
          @can('VerMarca')
          <li>
            <a href="{{url('/tipoequipos')}}"><i class="fas fa-list"></i>Ver listado</a>
          </li>
          @endcan
        </ul>
    </li>
  </ul>
  @endcan
  @can('VerMarca')
  <ul class="dropdown-menu">
    <li class="dropdown">
      <a href="#" class="has-dropdown"><i class="fab fa-apple"></i>Marcas</a>
      <ul class="dropdown-menu">
        @can('VerMarca')
        <li>
          <a href="{{url('/marcas')}}"><i class="fas fa-list"></i>Ver listado</a>
        </li>
        @endcan
      </ul>
  </li>
</ul>
@endcan
@can('VerModelo')
  <ul class="dropdown-menu">
    <li class="dropdown">
      <a href="#" class="has-dropdown"><i class="mdi mdi-smart-card-outline"></i>Modelos</a>
      <ul class="dropdown-menu">
        @can('VerModelo')
        <li>
          <a href="{{url('/modelos')}}"><i class="fas fa-list"></i>Ver listado</a>
        </li>
        @endcan
      </ul>
  </li>
</ul>
  @endcan
  @can('VerTipoReparaciones')
    <ul class="dropdown-menu">
      <li class="dropdown">
        <a href="#" class="has-dropdown"><i class="mdi mdi-server"></i>Servicios</a>
        <ul class="dropdown-menu">
          @can('VerModelo')
          <li>
            <a href="{{url('/tiporeparaciones')}}"><i class="fas fa-list"></i>Ver listado</a>
          </li>
          @endcan
        </ul>
    </li>
  </ul>
  @endcan
  </li>
  <li class="dropdown show active">
    <a href="#" class="menu-toggle nav-link has-dropdown"><i
        data-feather="settings"></i><span>Opciones generales</span></a>
        @can('VerReparaciones')
        <ul class="dropdown-menu">
          <li class="dropdown">
            <a href="#" class="has-dropdown"><i class="fas fa-phone"></i>Reparaciones</a>
            <ul class="dropdown-menu">
              @can('VerReparaciones')
              <li>
                <a href="{{url('/reparaciones')}}"><i class="fas fa-list"></i>Ver listado</a>
              </li>
              @endcan
              @can('RegistrarReparaciones')
              <li>
                <a href="{{url('/reparaciones/create')}}"><i class="fas fa-plus-square"></i>Nueva reparación</a>
              </li>
              @endcan
            </ul>
        </li>
      </ul>
      @endcan
      @can('VerListaDePrecios')
        <ul class="dropdown-menu">
          <li class="dropdown">
            <a href="#" class="has-dropdown"><i class="fas fa-dollar-sign"></i>Lista de precios</a>
            <ul class="dropdown-menu">
              @can('VerListaDePrecios')
              <li>
                <a href="{{url('/precios')}}"><i class="fas fa-list"></i>Ver listado</a>
              </li>
              @endcan
              
            </ul>
        </li>
      </ul>
      @endcan
      @can('VerListaDePrecios')
        <ul class="dropdown-menu">
          <li class="dropdown">
            <a href="#" class="has-dropdown"><i class="fas fa-cash-register"></i>Punto de Venta</a>
            <ul class="dropdown-menu">
              @can('VerVenta')
              <li>
                <a href="{{url('/venta')}}"><i class="fas fa-list"></i>Ver listado</a>
              </li>
              @endcan
              @can('RegistrarVenta')
              <li>
                <a href="{{url('/venta/nevo')}}"><i class="fas fa-plus-square"></i>Nueva venta</a>
              </li>
              @endcan
              
            </ul>
        </li>
      </ul>
      @endcan
      @can('VerProductos')
      <ul class="dropdown-menu">
        <li class="dropdown">
          <a href="#" class="has-dropdown"><i class="fas fa-store-alt"></i>Productos</a>
          <ul class="dropdown-menu">
            @can('VerProductos')
            <li>
              <a href="{{url('/productos')}}"><i class="fas fa-list"></i>Ver listado</a>
            </li>
            @endcan
            @can('RegistrarProductos')
            <li>
              <a href="{{url('/productos/nevo')}}"><i class="fas fa-plus-square"></i>Nuevo producto</a>
            </li>
            @endcan
            
          </ul>
      </li>
    </ul>
    @endcan
    @can('VerProveedores')
      <ul class="dropdown-menu">
        <li class="dropdown">
          <a href="#" class="has-dropdown"><i class="fas fa-truck-moving"></i>Proveedores</a>
          <ul class="dropdown-menu">
            @can('VerProveedores')
            <li>
              <a href="{{url('/proveedores')}}"><i class="fas fa-list"></i>Ver listado</a>
            </li>
            @endcan
            @can('RegistrarProveedores')
            <li>
              <a href="{{url('/proveedores/nevo')}}"><i class="fas fa-plus-square"></i>Nuevo proveedor</a>
            </li>
            @endcan
          </ul>
      </li>
    </ul>
    @endcan
    @can('VerClientes')
    <ul class="dropdown-menu">
      <li class="dropdown">
        <a href="#" class="has-dropdown"><i class="fas fa-handshake"></i>Clientes</a>
        <ul class="dropdown-menu">
          @can('VerClientes')
          <li>
            <a href="{{url('/clientes')}}"><i class="fas fa-list"></i>Ver listado</a>
          </li>
          @endcan
          @can('RegistrarClientes')
          <li>
            <a href="{{url('/clientes/nevo')}}"><i class="fas fa-plus-square"></i>Nuevo cliente</a>
          </li>
          @endcan
        </ul>
    </li>
  </ul>
  @endcan
    </li>
</ul> 
@push('scripts')
<script>
    $('.dropdown-menu').on('click', (event) => {
});
</script>
@endpush