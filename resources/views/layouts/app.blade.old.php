<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- BEGIN: teste-->
        <title>  {{ $title ?? 'ORCA' }}</title>
        <!-- END: teste-->
        {{ $page_css ?? '' }}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
    </head>
    <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

    <!-- BEGIN: Header-->
     @include('layouts.headers.principal')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts.menus.principal')

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                {{ $slot }}
            </div>
        </div>
    </div>
    <!-- END: Content-->


    @include('layouts.footers.principal')
    {{$page_js ?? ''}}

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 10,
                    height: 10
                });
            }
        })
    </script>

</body>

</html>
