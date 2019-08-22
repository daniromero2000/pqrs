<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="">
    <meta name="subject" content="">
    <meta name="copyright" content="">
    <meta name="language" content="ES">
    <meta name="classification" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link 
    href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
    rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap3.min.css') }}">
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="http://www.Model.org/" rel="canonical" />
</head>

<body class="hold-transition login-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="login-box">
                    <div class="login-logo"> <img src="{{asset('/img/logo.png')}}" alt="Model"
                            width="190"></div> @include('layouts.errors-and-messages')<div class="login-box-body">
                        <h1 class="login-box-msg">Inicia Sesión</h1>
                        <form action="{{ route('admin.login') }}" method="post"> {{ csrf_field() }}<div
                                class="form-group has-feedback">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="fa fa-envelope"></i></div> <input
                                        name="email" type="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <div class="input-group-addon"> <i class="fa fa-lock"></i></div> <input
                                        name="password" type="password" class="form-control" placeholder="Password"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> <button
                                        type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>