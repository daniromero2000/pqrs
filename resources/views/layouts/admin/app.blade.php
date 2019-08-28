<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="">
    <meta name="subject" content="Socomir">
    <meta name="copyright" content="Socomir">
    <meta name="language" content="ES">
    <meta name="classification" content="">
    <meta name="author" content="Socomir">
    <meta http-equiv="refresh" content="500">
    <title>@if($pqrSCCount>0) ({{ $pqrSCCount }})@endif Socomir</title>
    <link href="{{ asset('css/normalizeMIT.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap3.min.css') }}">
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">@yield('css')
=======
    <meta name="description" content="">
    <meta name="subject" content="Model">
    <meta name="copyright" content="Model">
    <meta name="language" content="ES">
    <meta name="classification" content="">
    <meta name="author" content="Model">
    <meta http-equiv="refresh" content="500">
    <title>Model</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.4.1 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap3.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @include('adminlte::plugins', ['type' => 'css'])

    @if(config('adminlte.pace.active'))
    <!-- Pace -->
    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/{{config('adminlte.pace.color', 'blue')}}/pace-theme-{{config('adminlte.pace.type', 'center-radar')}}.min.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- Normalize MIT -->
    <link href="{{ asset('css/normalizeMIT.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">


    @yield('adminlte_css')

    @yield('css')
    <!-- FavIcon -->
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
    <link rel="shortcut icon" href="{{ asset('favicons/favicon-96x96.png')}}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
<<<<<<< HEAD
    <link href="http://www.socomir.org/" rel="canonical" />
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper"> @include('layouts.admin.header', ['user' => $admin]) @include('layouts.admin.sidebar', ['user'
        => $admin] )<div class="content-wrapper"> @yield('content')</div> @include('layouts.admin.footer')
        @include('layouts.admin.control-sidebar')</div>
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/admin.min.js') }}"></script> @yield('js')
=======
    <link href="http://www.Model.org/" rel="canonical" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-purple sidebar-mini">


    @yield('body')
    <div class="wrapper">
        @include('layouts.admin.header', ['user' => $admin])
        @include('layouts.admin.sidebar', ['user'=> $admin] )
        <div class="content-wrapper">
            @yield('content')</div> 

            
            @include('layouts.admin.footer')
        @include('layouts.admin.control-sidebar')</div>

    @include('adminlte::plugins', ['type' => 'js'])


    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/admin.min.js') }}"></script>
    @yield('adminlte_js')
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
</body>

</html>