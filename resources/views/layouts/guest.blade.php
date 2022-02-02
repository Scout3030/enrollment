<!DOCTYPE html>
<html class="loading light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="{{ env('APP_NAME') }}">
        <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
        <link rel="apple-touch-icon" href="{{asset('images/ico/apple-icon-120.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo/favicon.ico')}}">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        {{-- Include core + vendor Styles --}}
        @include('panels.styles')
        {{-- Include core + vendor Styles --}}
        @include('panels.styles')
        @stack('styles')
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="vertical-layout vertical-menu-modern blank-page blank-page"
          data-menu="vertical-menu-modern"
          data-col="blank-page"
          data-framework="laravel"
          data-asset-path="{{ asset('/')}}">

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-body">
                    <div class="auth-wrapper auth-basic px-2">
                        <div class="auth-inner my-2">
                            <!-- Login basic -->
                            <div class="card mb-0">
                                <div class="card-body">

                                    <x-jet-authentication-card-logo />

                                    <x-jet-validation-errors class="mb-4" />

                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <h4 class="card-title mb-1">{{ __('Welcome to Vuexy!') }} 👋</h4>
                                    <p class="card-text mb-2">{{ __('Please sign-in to your account and start the adventure') }}</p>

                                    {{ $slot }}

                                    <p class="text-center mt-2">
                                        <span>{{ __('New on our platform?') }}</span>
                                        <a href="{{ route('register') }}">
                                            <span>{{ __('Create an account') }}</span>
                                        </a>
                                    </p>

                                    <div class="divider my-2">
                                        <div class="divider-text">{{ __('or') }}</div>
                                    </div>

                                    @include('partials.auth.social')

                                </div>
                            </div>
                            <!-- /Login basic -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Content-->
        {{-- include default scripts --}}
        @include('panels.scripts')

        <script type="text/javascript">
            $(window).on('load', function() {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>
        <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('js/scripts/pages/auth-login.js')}}"></script>
</body>
</html>
