@extends('layouts.front.app')
@section('title', 'Productos y Servicios')
@section('content')

<div class="flex-center position-ref full-height">
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-md-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">Productos y Servicios</h1>
            </div>
        </div>
        <div class="row top-buffer bottom-buffer">
            <div class="col-md-5 d-flex justify-content-center top-buffer">
                <img class="imgProducto shadow p-3 mb-5 bg-white rounded" src="{{asset('/img/producto1.jpg')}}"
                    alt="First slide">
            </div>
            <div class="col-md-6 top-buffer">
                <h2 class="productTitle1">
                    CRÉDITO DE DESCUENTO POR NÓMINA (LIBRANZA)
                </h2>
                <p class="text-justify"> Con nuestro crédito puedes financiar lo que quieras, y atender tus necesidades y las de tu grupo
                    familiar o si lo que requieres es mejorar el flujo de caja puedes unificar tus deudas actuales y
                    mejorar tu calidad de vida<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Te prestamos hasta los 89 años de edad<br>
                    <i class="fa fa-check yellow" aria-hidden="true"></i> Fácil aprobación<br>
                    <i class="fa fa-check yellow" aria-hidden="true"></i> Unificamos tus deudas<br>
                    <i class="fa fa-check yellow" aria-hidden="true"></i> Cuota fija durante el plazo del crédito<br>
                </P>
            </div>
        </div>
        <div class="row top-buffer bottom-buffer d-flex justify-content-center">
            <div class="col-md-6 top-buffer">
                <h2 class="productTitle2">
                    CRÉDITO PARA PENSIONADOS
                </h2>
                <p class="text-justify"> Dirigido a Pensionados de las diferentes pagadurías con las que mantenemos convenio a nivel nacional
                    y departamental en el que te ofrecemos tasas, plazos y montos ajustados a tus necesidades y perfil
                    de riesgo.<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Consulta nuestro listado de pagadurías con convenio activo <br>
                </P>
            </div>
            <div class="col-md-5 d-flex justify-content-center top-buffer">
                <img class="imgProducto shadow p-3 mb-5 bg-white rounded" src="{{asset('/img/producto2.jpg')}}"
                    alt="First slide">
            </div>
        </div>
        <div class="row top-buffer bottom-buffer">
            <div class="col-md-5 d-flex justify-content-center top-buffer">
                <img class="imgProducto shadow p-3 mb-5 bg-white rounded" src="{{asset('/img/producto3.jpg')}}"
                    alt="First slide">
            </div>
            <div class="col-md-6 top-buffer">
                <h2 class="productTitle3">
                    CRÉDITO PARA DOSCENTES
                </h2>
                <p class="text-justify"> Dirigido a Docentes Activos de entidades Departamentales, con el que puedes de forma fácil acceder
                    al crédito que necesites, mientras descontamos las cuotas de tu nómina.<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Consulta nuestro listado de pagadurías con convenio activo <br>
                </P>
            </div>
        </div>
        <div class="row top-buffer bottom-buffer d-flex justify-content-center">
            <div class="col-md-6 top-buffer">
                <h2 class="productTitle4">
                    CRÉDITO PARA MILITARES ACTIVOS
                </h2>
                <p class="text-justify"> Dirigido a Militares y Policías Activos de las diferentes fuerzas (Ejército, Fuerza Aérea, Armada y
                    Policía) , con el que puedes de forma fácil acceder al crédito que necesites, mientras descontamos
                    las cuotas de tu nómina.<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Consulta nuestro listado de pagadurías con convenio activo <br>
                </P>
            </div>
            <div class="col-md-5 d-flex justify-content-center top-buffer">
                <img class="imgProducto shadow p-3 mb-5 bg-white rounded" src="{{asset('/img/producto4.jpg')}}"
                    alt="First slide">
            </div>
        </div>
    </div>
</div>
@endsection