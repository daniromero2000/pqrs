@extends('layouts.front.app')
@section('title', 'PQR')
@section('content')

<head>

    <style>
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="row top-buffer">
                <div class="col-md-12 side-nopadding">
                    <h1 class="beneficiosTitle text-center block animatable fadeInUp ">PQR</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href=""><img src="{{asset('/img/engranaje.png')}}" alt="First slide"></a>
                    <div class="title m-b-md">
                        AQUÍ Proximamente podrás Realizar peticiones, quejas y reclamos
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection