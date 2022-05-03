<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Administrativo | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">


    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/tempusdominus.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/icheck-bootstrap.css') }}">

    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/jqvmap.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dist/adminlte.min.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/summernote/summernote.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/OverlayScrollbars.css') }}">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/daterangepicker/daterangepicker.css') }}">



    @hasSection('css')
        @yield('css')
    @endif
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.layouts.components.menu-superior')
        @include('admin.layouts.components.menu-lateral')

        <div class="content-wrapper">
            @include('admin.layouts.flash_message.flash-message')
            @yield('content')
        </div>

        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>


    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
        @component('admin.layouts.components.rodape')

        @endcomponent
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/assets/js/jquery/jquery.js') }}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/assets/js/jquery-ui/jquery-ui.js') }}"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/assets/js/bootstrap/bootstrap.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('backend/assets/js/chart.js/chart.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('backend/assets/js/sparklines/sparklines.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend/assets/js/jqvmap/jquery.vmap.js') }}"></script>

    <script src="{{ asset('backend/assets/js/jqvmap/maps/jquery.vmap.js') }}"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend/assets/js/jquery-knob/jquery-knob.js') }}"></script>

    <!-- daterangepicker -->
    <script src="{{ asset('backend/assets/js/moment/moment.js') }}"></script>

    <script src="{{ asset('backend/assets/js/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend/assets/js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('backend/assets/js/summernote/summernote-bs4.js') }}"></script>

    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/assets/js/overlayScrollbars/js/jquery.overlayScrollbars.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('backend/assets/js/dist/adminlte.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/assets/js/dist/demo.js') }}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend/assets/js/dist/pages/dashboard.js') }}"></script>

    @hasSection('js')
        @yield('js')
    @endif
</body>

</html>
