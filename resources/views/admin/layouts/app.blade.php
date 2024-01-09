<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce | {{ !empty($header_title) ? $header_title : '' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('public/admin/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/admin/assets/dist/css/adminlte.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar start-->

        @include('admin.layouts.header')
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])




        <!-- Main Sidebar Container end -->
        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->
        @yield('content')
        <!-- Control Sidebar -->

        @include('admin.layouts.footer')
        <!-- Main Footer end -->
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        
        @stack('scripts')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <script src="{{ url('public/admin/assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ url('public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE -->
        {{-- <script src="{{url('public/admin/assets/dist/js/adminlte.js')}}"></script> --}}

        <!-- OPTIONAL SCRIPTS -->
        <script src="{{ url('public/admin/assets/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        {{-- <script src="public/admin/assets/dist/js/demo.js"></script> --}}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ url('public/admin/assets/dist/js/pages/dashboard3.js') }}"></script>

        <!-- Bootstrap Switch -->
        <script src="{{ url('public/admin/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
</body>

</html>
