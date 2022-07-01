<!DOCTYPE html>
<html class="loading light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="IES Leopoldo Alas Clarin">
    <meta name="author" content="{{ env('APP_NAME') }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    {{-- Include core + vendor Styles --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/vendors.min.css') }}" />
    @stack('vendor-styles')
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base/themes/dark-layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base/themes/bordered-layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base/themes/semi-dark-layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base/core/menu/menu-types/vertical-menu.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/base/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/ui-feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/overrides.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @stack('styles')
    <style>
        .expanded .navbar-brand img{
            max-height: 100px;
        }
        .navbar-brand img{
            max-height: 45px;
        }
    </style>
</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static default"
      data-open="click"
      data-menu="vertical-menu-modern"
      data-col="default"
      data-framework="laravel"
      data-asset-path="{{ asset('/')}}">
<!-- BEGIN: Header-->
@include('layouts.partials.navbar')
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
@include('layouts.partials.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">

            @include('layouts.partials.messages')
            @yield('content')

        </div>
    </div>
</div>
<!-- End: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

{{-- include footer --}}
@include('panels.footer')
<script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('vendors/js/ui/jquery.sticky.js') }}"></script>
@stack('vendor-scripts')
<script src="{{ asset('js/core/app-menu.js') }}"></script>
<script src="{{ asset('js/core/app.js') }}"></script>
<script src="{{ asset('js/core/scripts.js') }}"></script>
<script src="{{ asset('js/scripts/customizer.js') }}"></script>
<script src="{{ asset('js/scripts/utils.js') }}"></script>

<script type="text/javascript">
    $(window).on('load', function() {

        if (feather) {
            feather.replace({
                width: 14, height: 14
            });
        }
    })
</script>
@stack('scripts')
</body>
</html>
