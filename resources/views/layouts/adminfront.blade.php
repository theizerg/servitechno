<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SERVITEC - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/system.css') }}">
    <link rel="stylesheet" href="{{asset('css/some.css')}}">
 
    @stack('styles')
  </head>

  <body  id="body">
    <!--Page Content Here -->
    @yield('content')

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/some.js') }}"></script>
    @stack('scripts')

   
  </body>

</html>
