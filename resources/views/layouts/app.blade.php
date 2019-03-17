<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kredo IT') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/font-face.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}">

    {{-- Bootsrap CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendor/bootstrap-4.1/bootstrap.mi.css') }}"> --}}

    {{-- Vendor CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/animsition/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/wow/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">

    <!-- Main Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    @stack('css')
</head>
<body class="animsition">
    <div class="page-wrapper">
        @auth
            @include('inc.nav-mobile')
            @include('inc.sidebar')
        @endauth
    <div class="{{ (Request::is('/') ||
                    Request::is('register') ||
                    Request::is('login')) ? '' : ' page-container'}}">
            @auth
                @include('inc.nav-desktop')
            @endauth
            @if (Request::is('/') ||
                 Request::is('register') ||
                 Request::is('login'))
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
            @else
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
            @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

{{-- VENDOR JS --}}
<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

{{-- MAIN JS --}}
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('vendor/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/moment.js') }}"></script>

@stack('scripts')
</html>
