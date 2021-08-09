<ul class="sidebar-menu">
 <li class="menu-header">Punto de venta</li>
<li class="dropdown ">
  <a href="{{url('/')}}" class="nav-link active show"><i data-feather="home"></i><span>Inicio</span></a>
</li>
 <li class="dropdown active show">
  @can('VerUsuario')
  <a href="#" class="menu-toggle nav-link has-dropdown toggled active"><i
      data-feather="settings"></i><span>Administración</span></a>
     
     @can('VerUsuario')
      <ul class="dropdown-menu">
        <li class="dropdown">
            @can('VerUsuario')
              <a href="{{url('usuarios')}}"><i class="fas fa-user"></i>Usuarios</a>
            @endcan
      </li>
    </ul>
    @endcan
   @endcan
    @can('VerRole')
      <ul class="dropdown-menu">
        <li class="dropdown">
            @can('VerRole')
              <a href="{{url('/roles')}}"><i class="fas fa-user-lock"></i>Roles</a>
            @endcan
      </li>
    </ul>
    @endcan
    @can('VerOrganismo')
      <ul class="dropdown-menu">
        <li class="dropdown">
            @can('VerOrganismo')
              <a href="{{url('organismos')}}"><i class="fas fa-building"></i>Organismos</a>
            @endcan
      </li>
    </ul>
    @endcan
  </li>
  <li class="dropdown active show">
  <a href="#" class="menu-toggle nav-link has-dropdown"><i
      data-feather="settings"></i><span>Registros principales</span></a>
    @can('VerTipoEquipos')
      <ul class="dropdown-menu">
        <li class="dropdown">
            @can('VerTipoEquipos')
              <a href="{{url('tipoequipos')}}"><i class="fas fa-laptop"></i>Tipo de equipos</a>
            @endcan
      </li>
    </ul>
    @endcan
  @can('VerMarca')
      <ul class="dropdown-menu">
        <li class="dropdown">
            @can('VerMarca')
              <a href="{{url('marcas')}}"><i class="fab fa-apple"></i>Marcas</a>
            @endcan
      </li>
    </ul>
    @endcan
    @can('VerModelo')
      <ul class="dropdown-menu">
        <li class="dropdown">
            @can('VerModelo')
              <a href="{{url('modelos')}}"><i class="fab fa-google"></i>Modelos</a>
            @endcan
      </li>
    </ul>
    @endcan
  @can('VerTipoReparaciones')
      <ul class="dropdown-menu">
        <li class="dropdown">
            @can('VerTipoReparaciones')
              <a href="{{url('tiporeparaciones')}}"><i class="fas fa-server"></i>Tipo de reparaciones</a>
            @endcan
      </li>
    </ul>
    @endcan
  </li>
  <li class="dropdown active show ">
    <a href="#" class="menu-toggle nav-link has-dropdown"><i
        data-feather="settings"></i><span>Punto de venta</span></a>
         @can('VerCaja')
          <ul class="dropdown-menu">
             <li class="dropdown">
               @can('VerCaja')
                <a href="{{url('cajas')}}"><i class="fas fa-cash-register"></i>Cajas</a>
               @endcan
             </li>
         </ul>
    @endcan
         @can('VerProductos')
          <ul class="dropdown-menu">
             <li class="dropdown">
               @can('VerProductos')
                <a href="{{url('productos')}}"><i class="fas fa-store-alt"></i>Productos</a>
               @endcan
             </li>
         </ul>
    @endcan
     @can('VerProveedores')
          <ul class="dropdown-menu">
             <li class="dropdown">
               @can('VerProveedores')
                <a href="{{url('proveedores')}}"><i class="fas fa-truck-moving"></i>Proveedores</a>
               @endcan
             </li>
         </ul>
    @endcan
     @can('VerClientes')
          <ul class="dropdown-menu">
             <li class="dropdown">
               @can('VerClientes')
                <a href="{{url('clientes')}}"><i class="fas fa-handshake"></i>Clientes</a>
               @endcan
             </li>
         </ul>
    @endcan
  </li>
  <li class="dropdown active show ">
    <a href="#" class="menu-toggle nav-link has-dropdown"><i
        data-feather="settings"></i><span>Reparaciones</span></a>
         @can('VerReparaciones')
          <ul class="dropdown-menu">
             <li class="dropdown">
               @can('VerReparaciones')
                <a href="{{url('ordenservicios')}}"><i class="fas fa-phone"></i>Orden de servicio</a>
               @endcan
             </li>
         </ul>
    @endcan
     @can('VerListaDePrecios')
          <ul class="dropdown-menu">
             <li class="dropdown">
               @can('VerListaDePrecios')
                <a href="{{url('precios')}}"><i class="fas fa-list"></i>Lista de precios</a>
               @endcan
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