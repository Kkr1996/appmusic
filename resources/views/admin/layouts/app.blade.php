<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class=""
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('/') }}"
  data-template="vertical-menu-template-starter"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Karhari Media Industry') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <!-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->


<!-- THEME INT START-->

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<!-- Icons -->
<link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css')}}" />


<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<!-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"> -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<!-- Vendor -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css')}}" />

<!-- Template Customizer & Theme Config -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>

<!-- Drk
layout-navbar-fixed dark-style layout-menu-fixed layout-menu-collapsed
-->
<!-- Core CSS -->

@auth
    @if(Auth::user()->theme_mode =='dark')

      <?php
      $classDark = "dark-mode";
      ?>
        <link rel="stylesheet"  type="text/css" href="{{ asset('assets/vendor/css/rtl/core-dark.css') }}"  />
        <link rel="stylesheet"  type="text/css" href="{{ asset('assets/vendor/css/rtl/theme-default-dark.css') }}" />
    @else
     <?php
      $classDark = "white-mode";
      ?>
        <link rel="stylesheet"  type="text/css" href="{{ asset('assets/vendor/css/rtl/core.css') }}"  />
        <link rel="stylesheet"  type="text/css" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
    @endif

    @else
       <link rel="stylesheet"  type="text/css" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
       <link rel="stylesheet"  type="text/css" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
@endauth

      <link rel="stylesheet"  type="text/css" href="{{ asset('assets/custom/css/custom.css') }}"/>

</head>
<body class="<?=$classDark;?>">
    <div id="app">
        <main class="py-0">
          <div class="site-container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                       @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        <div class="layout-wrapper layout-content-navbar">
                            <div class="layout-container">
                            @auth 
                                @include('admin.layouts.aside') 
                                <div class="layout-page">
                                    @include('admin.layouts.nav')
                                    @yield('content')
                                </div>
                            @else
                                 @yield('content') 
                            @endauth
                    </div>
               </div>
          </div>

        </main>
    </div>


<div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
</div>
<!-- jQuery and other libraries -->


<!-- SCRIPT START -->
<!-- Core libraries and utilities built into a single file -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script> 
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<!-- <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script> -->


<!-- FormValidation Plugin and its dependencies -->
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<!-- Main JavaScript file -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/pages-auth.js') }}"></script>
<script src="{{ asset('assets/custom/js/custom.js') }}"></script>

<!-- Page specific JavaScript file -->
<script>
      
</script>

</body>
</html>
