@extends('theme::auth')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href=""><i class="fa fa-heartbeat text-red fa-lg" aria-hidden="true"></i> <b>Kekec</b>MED</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                           placeholder="E-Mail">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-block btn-primary">LogIn <i class="fa fa-sign-in"></i>
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <style type="text/css">
        body.login-page {
            background-image: url('{{asset('modules/theme/admin-lte/dist/img/background.jpg')}}') !important;
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

@endsection