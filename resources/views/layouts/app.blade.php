<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | Athena</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/css/select2.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-duallistbox.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">

        @yield('css')

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    </head>

    <body data-topbar="dark" data-layout="horizontal">
        <div class="blank-container"></div>
        <div class="progress-bar-container">
            <div class="progress-bar"></div>
        </div>
        <div id="layout-wrapper">
            @include('layouts.topbar')
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @include('layouts.messages')
                        @yield('content')
                        @include('layouts.footer')
                    </div>          
                </div>
            </div>    
        </div>
        @include('layouts.scripts')
        @yield('scripts')
    </body>
</html>
