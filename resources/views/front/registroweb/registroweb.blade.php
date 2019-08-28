@extends('layouts.front.app')
@section('title', 'Registro Web')
@section('content')

<body oncopy="return false" oncut="return false" onpaste="return false">
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-md-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">ACTUALIZACIÓN DEL REGISTRO WEB ANTE
                    LA DIAN</h1>
            </div>
        </div>
        <hr>
        <div class="container top-buffer bottom-buffer">
            <div class="row top-buffer">
                <div class="col-md-10">
                    <ul class="list-unstyled">
                        <li> <a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/RADICADO FORMULARIO 5245.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Radicado Formulario
                                5245</a> </li>
                        <li> <a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/RADICADO FORMATO 2531.pdf')}}"><i class="fa fa-angle-right yellow"
                                    aria-hidden="true"></i> Radicado Formato 2531</a> </li>
                        <li><a target="_blank" class="reglamentos" href="{{asset('/pdf/RADICA FORMATO 2530.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Radicado Formato 2530</a>
                        </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/Informe de Gestión 2018.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i class="fa fa-angle-right yellow"
                                    aria-hidden="true"></i> Informe de Gestión 2018</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/Estados Finanieros 2018.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i class="fa fa-angle-right yellow"
                                    aria-hidden="true"></i> Estados Financieros 2018</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/Certificación Antecedentes.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Certificación
                                Antecedentes</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/Certificacion Revisar Fiscal.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Certificación Revisar
                                Fiscal</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/Certificacion ingresos.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i class="fa fa-angle-right yellow"
                                    aria-hidden="true"></i> Certificación ingresos</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/Camara de Comercio Socomir.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Camara de Comercio
                                Socomir</a> </li>
                        <li><a target="_blank" class="reglamentos"
                                href="{{asset('/pdf/Acta No 01 constitución SOCOMIR.pdf#toolbar=0&navpanes=0&scrollbar=0')}}"><i
                                    class="fa fa-angle-right yellow" aria-hidden="true"></i> Acta No 01 constitución
                                SOCOMIR</a> </li>

                    </ul>
                </div>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>
@endsection