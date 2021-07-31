 <head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SERVITEC - @yield('title')</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/system.css')}}">
  <link rel="stylesheet" href="{{asset('css/some.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('images/logo/logo-login.png')}}' />
  @stack('styles')
</head>
 
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky blue-gradient-dark ">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i class="fas fa-align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize" style="margin-top:6px; color:white;"></i>
              </a></li>
            <li>
              
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell" style=" color:white;"></i>
            </a>
            
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('assets/img/user.png') }}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
               <a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn  btn-primary blue darken-4 form-control">
                    <i class="fas fa-sign-out-alt"></i> Salir
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('/') }}"> <img alt="image" src="{{ asset('images/logo/logo-login.png') }}" class="header-logo" /> <span
                class="logo-name">SERVITEC</span>
            </a>
          </div>
         @include('layouts.partials.leftmenu')
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        
            @yield('content')


         @include('layouts.partials.modal.tiporeparacion.createtiporeparacion')
         @include('layouts.partials.modal.tipoequipo.createtipoequipo')
         @include('layouts.partials.modal.marcas.createmarca')
         @include('layouts.partials.modal.modelos.createmodelo')
        
         @include('layouts.partials.modal.usuario.createmodal')
         @include('layouts.partials.modal.organismo.modalorganismocreate')
        

        
      </div>
      
    </div>
    <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
  </div>


    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/system.js') }}"></script>
    <script src="{{ asset('js/some.js') }}"></script>
    
     <script>

         @if(Session::has('message'))
         var type = "{{ Session::get('alert-type', 'info') }}";
         switch(type){
             case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;

             case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                 break;

             case 'success':
                 toastr.success("{{ Session::get('message') }}");
                 break;

             case 'error':
                 toastr.error("{{ Session::get('message') }}");
                 break;
         }
     @endif
     </script>

     
    @stack('scripts')

  </body>

</html>
