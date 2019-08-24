@extends('layouts.front.app')
@section('title', 'Quíenes Somos')
@section('content')

<body>
    <div class="row top-buffer">
        <div class="col-md-12 side-nopadding">
            <h1 class="beneficiosTitle text-center block animatable fadeInUp">QUÍENES SOMOS</h1>
        </div>
    </div>
    <section class="container top-buffer top-sm-buffer">
        <hr>
        <div class="top-buffer aboutCard shadow p-3 mb-5 bg-white rounded">
            <div class="row">
                <div class="col-md-12 text-justify block animatable fadeInUp">
                    <p><strong>SOCOMIR (SOCIEDAD COOPERATIVA DE MICROFINANZAS)</strong> incursionó en la colocación de
                        crédito para beneficio
                        de sus asociados desde el año 2008 a través del crédito por libranza, extendiendo su cobertura a
                        los
                        pensionados y/o empleados del sector público.<br><br>

                        <strong>SOCOMIR</strong> es una persona jurídica del sector cooperativo orientada a la
                        prestación de
                        servicios,
                        clasificada como multiactiva de aportes y crédito, de patrimonio social variable e ilimitado,
                        regida
                        por la legislación cooperativa, los estatutos sociales y vigilada por la Superintendencia de
                        Economía Solidaria.<br><br>

                        Tenemos convenios con las pagadurías más importantes como Colpensiones, FOPEP, Fiduprevisora,
                        Protección, BBVA Seguros, Porvenir, Colfondos, Mapfre, Gobernaciones y Alcaldías a nivel
                        nacional,
                        entre otras.<br><br>

                        <strong>Estructura comercial:</strong> A nivel comercial y para la atención al público, la
                        Cooperativa tiene oficina
                        en Bogotá y Sincelejo y cuenta con 8 puntos de atención a nivel nacional que operan bajo la
                        marca
                        “CREO – Crédito por Libranza”.<br><br>

                        Contamos actualmente con más de 8.000 asociados.<br><br>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center side-nopadding">
            <div class="col-md-4 d-flex justify-content-center">
                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                    <li class="nav-item nav-itemAbout ">
                        <a class="nav-linkAbout nav-link aboutTabText active" id="home-tab" data-toggle="tab"
                            href="#bogota" role="tab" aria-controls="home" aria-selected="true"> Misión</a>
                    </li>
                    <li class="nav-item nav-itemAbout ">
                        <a class="nav-linkAbout nav-link aboutTabText" id="profile-tab" data-toggle="tab" href="#cali"
                            role="tab" aria-controls="profile" aria-selected="false">
                            Visión</a>
                    </li>
                    <li class="nav-item nav-itemAbout ">
                        <a class="nav-linkAbout nav-link aboutTabText" id="contact-tab" data-toggle="tab" href="#ibague"
                            role="tab" aria-controls="contact" aria-selected="false">
                            Valores y principios</a>
                    </li>
                    <li class="nav-item nav-itemAbout ">
                        <a class="nav-linkAbout nav-link aboutTabText" id="contact-tab" data-toggle="tab"
                            href="#manizales" role="tab" aria-controls="contact" aria-selected="false">
                            Objetivos</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-8">
                <div class="tab-content d-flex justify-content-center" id="myTabContent">
                    <div class="tab-pane fade show active" id="bogota" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row pb-2">
                            <div class="col-md-12 text-justify">
                                <h2>Misión</h2>
                                <p>Somos una cooperativa multiactiva de aportes y crédito que promueve el desarrollo
                                    integral, fundamentada en la Equidad, Solidaridad, Respeto y Confianza para
                                    satisfacer las necesidades sociales y de consumo de sus asociados y sus familias,
                                    mediante un servicio ágil y personalizado que redunde en el beneficio de la
                                    comunidad.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cali" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row pb-2">
                            <div class="col-md-12 text-justify">
                                <h2>Visión</h2>
                                <p>SOCOMIR, se consolidará en
                                    el 2020 como una cooperativa reconocida por su solidez, eficiencia en la prestación
                                    de servicios, fuente de solución a las necesidades y responsabilidad social;
                                    aportando al mejoramiento de la calidad de vida de nuestros asociados y su familia,
                                    con una gestión participativa de ellos.
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="ibague" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row pb-2">
                            <div class="col-md-12 text-justify">
                                <p>
                                    <h2 class="text-center">Valores</h2>
                                    <strong>AYUDA MUTUA:</strong> es el accionar conjunto de nuestros asociados y la
                                    cooperativa para la
                                    solución de problemas comunes. Buscando de forma constate de la superación de las
                                    expectativas de nuestros asociados y la propia.<br><br>
                                    <strong>SOLIDARIDAD:</strong> luchamos por conseguir el desarrollo sostenible de
                                    nuestros asociados y
                                    su familia sin que se afecten sus aportes.<br><br>
                                    <strong>HONESTIDAD Y TRANSPARENCIA:</strong> somos coherentes con el pensar, decir y
                                    actuar. Nuestros
                                    asociados y directivos presentan conductas transparentes, que se oponen al
                                    encubrimiento, el falseamiento de la información y al engaño<br><br>
                                    <strong>COMPROMISO:</strong> hacemos realidad las promesas pactadas, actuando con
                                    responsabilidad e
                                    integridad en la ejecución de nuestras funciones.<br><br>
                                    <strong>RESPETO:</strong> reconocer, aceptar y valorar las cualidades y derechos de
                                    todos nuestros
                                    asociados.<br><br>

                                    <h2 class="text-center">Principios</h2>
                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Adhesión libre, voluntaria,
                                    responsable y abierta.<br>
                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Espíritu de solidaridad,
                                    cooperación, participación y ayuda mutua.<br>
                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Autonomía, autodeterminación y
                                    autogobierno.<br>
                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Participación económica de los
                                    asociados en justicia y equidad.<br>
                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Formación e información
                                    permanente y oportuna de sus miembros.<br>
                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Integración con otras
                                    organizaciones del sector solidario.<br>
                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Servicio a la comunidad.<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="manizales" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row pb-2">
                            <div class="col-md-12 text-justify">
                                <h2 class="text-center">Objetivos</h2>
                                <p><strong>General:</strong> Desarrollar la actividad financiera, mediante la prestación
                                    de servicios de
                                    crédito, contribuyendo al progreso de los asociados, sus familias y la comunidad en
                                    general.<br><br>

                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Fortalecer la estructura
                                    financiera de SOCOMIR, mediante unos adecuados márgenes de
                                    cobertura y apalancamientos financieros, generando resultados que permitan el
                                    crecimiento de la rentabilidad.<br><br>
                                    <i class="fa fa-check yellow" aria-hidden="true"></i> Otorgar créditos destinados a
                                    satisfacer las necesidades de los asociados, mediante
                                    el buen uso de las herramientas técnicas y un adecuado análisis que conduzcan a la
                                    óptima colocación del crédito.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-8 -->
        </div>
        <hr>
    </section>
</body>

</html>
@endsection