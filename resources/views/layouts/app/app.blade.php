<!DOCTYPE html>
<html>
<head>
    @include('layouts.app.head')
</head>
<body class="hold-transition sidebar-mini fixed">
<div class="wrapper">

    @include('layouts.app.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.app.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @include('layouts.app.contentwrapper')
    <!-- /.content-wrapper -->
    @include('layouts.app.footer')

    <!-- Control Sidebar -->
    @include('layouts.app.controlsidebar')

</div>
<!-- ./wrapper -->

@include('layouts.app.scripts')
</body>
</html>
