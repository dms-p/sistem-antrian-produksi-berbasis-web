<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}{{$title ? ' - '.$title:null}}</title>
    <!-- script -->
    <script src="{{asset('public/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/vendors/moment/moment-with-locales.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- style -->
    <link href="{{ asset('public/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendors/overlayScrollbars/css/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendors/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendors/fontawesome-free/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/vendors/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendors/select2/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendors/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendors/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendors/datatables/dataTables.bootstrap4.min.css') }}">
</head>
<body>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('includes.navbar')
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('includes.sidebar')
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('title')
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <footer class="main-footer">
            @include('includes.footer')
        </footer>
    </div>
    <script src="{{asset('public/vendors/popper/popper.min.js')}}"></script>
    <script src="{{asset('public/vendors/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/adminlte.min.js')}}"></script>
    <script src="{{asset('public/vendors/overlayScrollbars/js/OverlayScrollbars.min.js')}}"></script>
    <script src="{{asset('public/vendors/select2/js/select2.js')}}"></script>
    <script src="{{asset('public/vendors/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('public/js/custom.js')}}"></script>
    @yield('script')
</body>
</html>
