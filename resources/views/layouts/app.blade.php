<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @include('layouts.contentwrapper')
    <!-- /.content-wrapper -->
    @include('layouts.footer')

    <!-- Control Sidebar -->
    @include('layouts.controlsidebar')

</div>
<!-- ./wrapper -->

@include('layouts.scripts')
</body>
</html>
