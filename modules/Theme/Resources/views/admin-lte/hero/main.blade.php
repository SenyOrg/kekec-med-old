<!DOCTYPE html>
<html>
<head>
    @include('theme::admin-lte.app.partials.head-includes')
</head>
<body class="hold-transition full-background">
<div class="main-header">
    <div class="login-logo">
        <a href=""><i class="fa fa-heartbeat text-red fa-lg" aria-hidden="true"></i> <b>Kekec</b>MED</a>
    </div>
    @yield('header')
</div>
@yield('content')


<style type="text/css">
    body {
        background-image: url('{{$vc->getThemeAsset('img/background.jpg')}}') !important;
    }

    div.main-header {
        background-color: white;
        text-align: center;
        padding: 20px;
    }

    div.login-logo {
        margin-bottom: 0 !important;
    }
</style>
@include('theme::admin-lte.app.partials.scripts')
@yield('end-content')
</body>
</html>
