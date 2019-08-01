@extends('layouts.front.app')
@section('title', 'Reglamentos')
@section('content')

<body>
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-md-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">Reglamentos</h1>
            </div>
        </div>
        <hr>
        <div class="container top-buffer bottom-buffer">
            <div class="row top-buffer">
                <div class="col-md-10">
                    <ul class="list-unstyled">
                        <li> <a target="_blank" class="reglamentos" href="{{asset('/pdf/manual-credito-2019.pdf')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Reglamento de
                                Crédito</a> </li>
                        <li> <a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/politicas-de-gestion-de-cobranza-socomir.pdf')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Reglamento de
                                Cobranza</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/2019 REGLAMENTO Y CONDICIONES DE CREDITO LIBRANZA SOCOMIR.docx nov 2018.pdf')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Reglamento y
                                Condiciones
                                de Crédito Libranza</a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>
@endsection