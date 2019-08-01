@extends('layouts.front.app')
@section('title', 'Crédito Libranza')
@section('content')

<body>
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">Créditos por Libranza</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <hr>
                <p class="libranzaText text-justify"><strong>Intereses corrientes/remuneratorios:</strong> Será la que
                    fije SOCOMIR
                    para el período en el cual se realice el desembolso. Los intereses se
                    causarán desde la fecha de desembolso y la tasa estará vigente durante el plazo establecido. Se
                    informa a la parte deudora que durante
                    el período de financiación la tasa de interés no podrá ser superior a 1,5 veces el interés bancario
                    corriente que certifica la Superintendencia
                    Financiera de Colombia.<br><br>

                    <strong>Intereses Moratorios:</strong> Será la máxima permitida por la ley para el momento de su
                    cobro.<br><br>

                    <strong>Desfase:</strong> El tiempo que transcurre entre el momento del desembolso del dinero al
                    asociado y el
                    momento en que la pagaduría descuenta
                    y traslada a SOCOMIR el dinero correspondiente a la primera cuota del crédito otorgado está
                    comprendido entre uno (1) y tres (3) meses
                    dependiendo de la pagaduría y modalidad de crédito (con o sin compra de cartera). Durante este
                    período se cobra el interés mensual
                    pactado con el asociado sin exigir abonos a capital. Este valor podrá ser financiado y en caso de un
                    mayor o menor cobro se ajustará la
                    diferencia en la última cuota y/o pago de la obligación.<br><br>

                    <strong>Seguro de vida grupo deudores:</strong> Ampara el saldo insoluto de la deuda en caso de
                    fallecimiento del
                    asociado. El asegurado podrá elegir
                    la compañía de seguros de su preferencia, no obstante, SOCOMIR ofrece la póliza colectiva con LA
                    EQUIDAD SEGUROS cuyas
                    condiciones podrán ser validadas en su página web:
                    http://www.laequidadseguros.coop/productos/seguros-de-vida/vida-
                    grupo-deudores<br><br>

                    <strong>Tipo de cobertura de garantía - fianza:</strong> La aprobación del crédito podrá estar
                    sujeta a la
                    constitución de una garantía, otorgada por un
                    tercero llamado "Garante", quien recibirá en contraprestación una comisión calculada sobre el monto
                    garantizado, que podrá
                    descontarse en el desembolso o se financiará dentro del crédito otorgado y que será definida por el
                    Garante de acuerdo con el perfil de
                    riesgo del solicitante.<br><br>

                    <strong>Valor Comisión:</strong> Ver tasas y tarifas vigentes<br><br>

                    <strong>Gastos de cobranza:</strong> Estarán a cargo del cliente los gastos que ocasione el cobro
                    extrajudicial de
                    las obligaciones y si hubiere lugar a los
                    gastos judiciales de conformidad con las disposiciones legales aplicables. Las tarifas por los
                    gastos de cobranza prejurídica y cobranza
                    jurídica se calcularán y establecerán de la siguiente forma: i) Hasta el 10% por cobro prejurídico,
                    porcentaje que se aplica al saldo en
                    mora en el momento de inicio de la gestión de cobro, y ii) hasta el 20% por cobro jurídico,
                    porcentaje que se aplica sobre el capital e
                    intereses y cualquier otro concepto adeudado en el momento de inicio del cobro jurídico.<br><br>

                    <strong>Derecho de prepago:</strong> El cliente podrá en cualquier momento realizar el pago parcial
                    o total del saldo
                    de su obligación sin incurrir en
                    ningún tipo de sanción o penalidad.<br><br>

                    <strong>Cláusula Aceleratoria:</strong> En el evento en que exista incumplimiento en el pago de las
                    cuotas de capital
                    o intereses, SOCOMIR podrá
                    declarar exigible todas y cada una de las obligaciones a su favor, aun cuando el plazo pactado en
                    las mismas no hubiere vencido; de la
                    misma forma, SOCOMIR queda expresamente autorizado para aplicar la tasa máxima de interés moratorio
                    permitida legalmente a partir
                    del incumplimiento.<br><br>

                    <strong>Condiciones excepcionales de reestructuración:</strong> De conformidad con el manual de
                    crédito. Al deudor
                    asociado, se le pone en
                    conocimiento el reglamento de crédito de la Cooperativa para todos los efectos legales.

                </p>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center top-buffer bottom-buffer">
                <span class="autorizacionesText">Autorizaciones</span>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div
                        class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 top-buffer text-center bottom-buffer">
                        <a target="_blank" href="{{asset('/pdf/CONDICIONES DE CREDITO LIBRANZA SOCOMIR v5.pdf')}}"><img
                                class="libranzaIconPdf" src="{{asset('/img/icono-PDF.png')}}" alt="First slide">
                            <div class="block animatable fadeInUp">
                                <h2 class="libranzaIconPdfText text-center">Condiciones<br> del Crédito</h2>
                            </div>
                        </a>
                    </div>
                    <div
                        class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 top-buffer text-center bottom-buffer">
                        <a target="_blank" href="{{asset('/pdf/LIBRANZA_SOCOMIR.pdf')}}"><img class="libranzaIconPdf"
                                src="{{asset('/img/icono-PDF.png')}}" alt="First slide">
                            <div class="block animatable fadeInUp">
                                <h2 class="libranzaIconPdfText text-center">Libranza</h2>
                            </div>
                        </a>
                    </div>
                    <div
                        class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 top-buffer text-center bottom-buffer">
                        <a target="_blank" href="{{asset('/pdf/pagare_2019.pdf')}}"><img class="libranzaIconPdf"
                                src="{{asset('/img/icono-PDF.png')}}" alt="First slide">
                            <div class="block animatable fadeInUp">
                                <h2 class="libranzaIconPdfText text-center">Pagaré</h2>
                            </div>
                        </a>
                    </div>
                    <div
                        class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 top-buffer text-center bottom-buffer">
                        <a target="_blank" href="{{asset('/pdf/SOLICITUD_DE_CREDITO_SOCOMIR.pdf')}}"><img
                                class="libranzaIconPdf" src="{{asset('/img/icono-PDF.png')}}" alt="First slide">
                            <div class="block animatable fadeInUp">
                                <h2 class="libranzaIconPdfText text-center">Solicitud de<br>
                                    crédito por<br>
                                    libranza</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</body>

</html>
@endsection