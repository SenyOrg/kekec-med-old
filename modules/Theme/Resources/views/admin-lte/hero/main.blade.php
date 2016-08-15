<!DOCTYPE html>
<html>
<head>
    @include('theme::admin-lte.app.partials.head-includes')
</head>
<body class="">
<div class="main-header">
    <div class="login-logo">
        <a href=""><i class="fa fa-heartbeat text-red fa-lg" aria-hidden="true"></i> <b>Kekec</b>MED</a>
    </div>
    @yield('header')
</div>
<div class="hero-content container-fluid">
@yield('content')
</div>


<style type="text/css" scoped>
    {{--html,body {--}}
        {{--background: url('{{$vc->getThemeAsset('img/background.jpg')}}') no-repeat center center fixed !important;--}}
        {{---webkit-background-size: cover !important;--}}
        {{---moz-background-size: cover !important;--}}
        {{---o-background-size: cover !important;--}}
        {{--background-size: cover !important;--}}
    {{--}--}}

    div.main-header {
        background-color: white;
        text-align: center;
        padding: 20px;
        height: 10vh;
        min-height: 10vh;
        max-height: 10vh;
    }

    div.hero-content {
        height: 90vh;
        min-height: 90vh;
        max-height: 90vh;
        overflow-y: scroll;
    }

    div.login-logo {
        margin-bottom: 0 !important;
    }
</style>
@include('theme::admin-lte.app.partials.scripts')
@yield('end-content')
</body>
</html>
