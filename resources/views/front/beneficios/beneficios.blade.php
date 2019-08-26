@extends('layouts.front.app')
@section('title', 'Beneficios')
@section('content')

<body>
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">Beneficios</h1>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 side-nopadding">
                <img class="img float-left hidden-xs imgBeneficios" src="{{asset('/img/images-04.png')}}" alt="Crédito para todos">
                <p class="beneficiosText"><strong>Los siguientes son los beneficios que nuestros asociados
                        encontraran:</strong> </p>
                <p class="beneficiosText text-justify ">
                    <i class="fa fa-check yellow" aria-hidden="true"></i> Atención personalizada por nuestro equipo
                    profesional de asesores Comerciales.<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Préstamos a asociados con edad hasta 89
                    años.<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Cuota fija en pesos durante todo el plazo del
                    crédito con cómodas tasas de financiación<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Préstamos a asociados Reportados.<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Unificamos tus deudas para mejorar tu flujo de
                    caja mensual <br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Monto desde $500.000 hasta $80.000.000<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> El monto a otorgar se define de acuerdo con la
                    Pagaduría, Capacidad de pago, la edad y Perfil de cada asociado <br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Flexibilidad de plazos: Plazos desde 13 hasta
                    120 meses<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Tiempo de respuesta: 24 horas para la
                    aprobación y el desembolso se realiza previa autorización de la pagaduría (cuando aplique)<br><br>

                    <i class="fa fa-check yellow" aria-hidden="true"></i> Seguro de vida del crédito, que ampara la
                    totalidad de la deuda en caso de fallecimiento y seguro a sus beneficiarios <br><br>
                </p>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>
@endsection