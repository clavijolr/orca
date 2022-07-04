<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>  {{ $titulo ?? 'CFM' }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}" />

    @yield('vendor-style')

    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/horizontal-menu.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}" />

    @yield('page-script')

</head>
<!-- END: head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

    <!-- BEGIN: Header-->
        @include('layouts.headers.principal')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
        @include('layouts.menus.principal')
    <!-- END: Main Menu-->

    <!-- BEGIN: conteudo-->
        <section class="conteudo">

        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            @yield('conteudo')

        </div>


        </section>
    <!-- END: conteudo-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
        @include('layouts.footers.principal')
    <!-- END: Footer-->

    <!-- BEGIN: scripts-->
    <section class="scripts">
        <script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

        <script src="{{ asset(mix('js/core/app-menu.js'))}}"></script>
        <script src="{{ asset(mix('js/core/app.js'))}}"></script>
        <script src="{{ asset(mix('js/scripts/customizer.js'))}}"></script>
        @yield('scripts')
    </section>
    <!-- END: scripts-->



    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 60,
                    height: 140
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
