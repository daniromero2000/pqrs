@extends('layouts.front.app')
@section('title', 'Reglamentos')
@section('content')

<body oncopy="return false" oncut="return false" onpaste="return false">
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
                        <li> <a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/manual-credito-2019.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Reglamento de
                                Crédito</a> </li>
                        <li> <a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/politicas-de-gestion-de-cobranza-socomir.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Reglamento de
                                Cobranza</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/2020 abr REGLAMENTO CONDICIONES DE CREDITO LIBRANZA SOCOMIR v5.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Reglamento y
                                Condiciones
                                de Crédito Libranza</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/Resolucion Convocatoria Elecciones de Delegados Final.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Elecciones</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/CONVOCATORIA ASAMBLEA NO PRESENCIAL  2020.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Convocatoria Asamblea no
                                Presencial</a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
    </div>
    @include('layouts.front.slideInicial')
</body>

</html>
@endsection