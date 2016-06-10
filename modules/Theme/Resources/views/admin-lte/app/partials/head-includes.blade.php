<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="favicon/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="favicon/manifest.json">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="favicon/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{$vc->getTitle()}}</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/plugins/select2/select2.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/dist/css/skins/_all-skins.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/plugins/iCheck/flat/blue.css')}}">
<!-- Morris chart -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/plugins/morris/morris.css')}}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/plugins/datepicker/datepicker3.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css')}}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/app.css')}}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{asset('modules/theme/admin-lte/plugins/datatables/dataTables.bootstrap.css')}}">

@stack('head-includes')

{{--
    Push additional items:

    @push('scripts')
        <script src="/example.js"></script>
    @endpush
--}}