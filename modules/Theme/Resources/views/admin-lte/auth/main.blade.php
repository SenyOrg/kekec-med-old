<!DOCTYPE html>
<html>
<head>
    @include('theme::admin-lte.app.partials.head-includes')
</head>
<body class="hold-transition login-page full-background">
@yield('content')

@include('theme::admin-lte.app.partials.scripts')

<style type="text/css">
    body.login-page {
        background-image: url('{{$vc->getThemeAsset('img/background.jpg')}}') !important;
        background-color: transparent !important;
    }

    div.login-box-body {
        background-color: transparent;
    }

    input.form-control {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .form-control-feedback {
        line-height: 40px !important;
    }

    /* Change the white to any color ;) */
    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0px 1000px white inset;
    }
</style>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
