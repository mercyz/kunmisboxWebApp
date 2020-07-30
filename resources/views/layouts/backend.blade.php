<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'KunmisBox') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/css/main.css')}}" />
    <!-- Font-icon css-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('custom/css/font-awesome/4.7.0/css/font-awesome.min.css')}}"
    />
    @stack("top-css")
  </head>

  <body class="app sidebar-mini rtl">

@yield('content')
    
 <!-- Essential javascripts for application to work-->
    <script src="{{asset('custom/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('custom/js/popper.min.js')}}"></script>
    <script src="{{asset('custom/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('custom/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('custom/js/plugins/pace.min.js')}}"></script>
  </body>
</html>