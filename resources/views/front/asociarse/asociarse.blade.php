@extends('layouts.front.app')
@section('title', 'Asociarse')
@section('content')

<body>
    <div class="container-fluid top-buffer">
        <div class="row top-buffer">
            <div class="col-md-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">Cómo Asociarse</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="asociarseTitle text-center">CONDICIONES PARA LA ADMISIÓN DE ASOCIADOS</h1>
            </div>
        </div>
        <hr>
        <div class="containerText ">
            <div class="row d-flex justify-content-center top-buffer">
                <div class="col-md-11 ">
                    <img class="img imgAsociarse side-nopadding float-right hidden-xs" src="{{asset('/img/images-05.png')}}"
                        alt="Crédito para todos">
                    <p class="conditionsText">Podrán ser asociados de la cooperativa todas
                        las<br class="mobile-break"> personas naturales
                        legalmente capaces y que se
                        adhieran<br class="mobile-break"> a los estatutos de la cooperativa, previa aceptación por parte<br class="mobile-break"> del Consejo de
                        Administración.<br class="mobile-break">
                        Las personas interesadas en asociarse a SOCOMIR, deben cumplir<br class="mobile-break"> con los siguientes
                        requisitos:<br><br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Presentar solicitud de ingreso por escrito
                        ante el Consejo de
                        Administración<br class="mobile-break"> y ser aceptado por
                        este.<br><br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Pagar una cuota de admisión, al momento de
                        ser aprobado su ingreso,
                        el equivalente<br class="mobile-break"> al 10% de un
                        salario mínimo mensual legal vigente, la cual no será reembolsable y que se<br class="mobile-break"> destinará para
                        gastos de
                        funcionamiento.<br><br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Pagar mensualmente como Aporte Social, el
                        equivalente al 0.2% de un
                        salario mínimo legal<br class="mobile-break"> mensual
                        vigente, los cuales serán devueltos al asociado en el momento de su retiro previa solicitud<br class="mobile-break">
                        escrita
                        al Consejo de Administración.
                    </p>
                    <p class="conditionsTextTitle block animatable fadeInUp">¿Quiénes pueden acceder a nuestros
                        servicios?
                    </p>
                    <p class="conditionsText2 block animatable fadeInUp">
                            <i class="fa fa-check yellow" aria-hidden="true"></i> Pensionados por vejez o invalidez<br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Empleados públicos nombrados en propiedad (carrera administrativa) con antigüedad superior a 6
                        meses<br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Beneficiarios de la pensión–Pensiones compartidas (esposa(o) y/o compañera(o) permanente)<br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Beneficiarios de la pensión – Hijos mayores de edad (con codeudor madre o padre beneficiarios de
                        la misma pensión)
                    </p>
                </div>
            </div>
        </div>
        <div class="containerText2">
            <div class="row d-flex justify-content-center">
                <div class="col-md-11">
                    <p class="conditionsTextTitle2 block animatable fadeInUp">
                        Documentos requeridos para acceder a nuestros servicios
                    </p>
                    <p class="conditionsText3 block animatable fadeInUp">Presentar la documentación requerida por la
                        Cooperativa :<br><br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Formulario de solicitud de crédito diligenciado y firmado con huella<br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Cédula de ciudadanía en original junto con Tres ( 03) Fotocopias al 150% con firma y huella del
                        asociado<br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Dos últimos desprendibles de nómina con firma y huella del asociado<br>
                        <i class="fa fa-check yellow" aria-hidden="true"></i> Certificación laboral vigente ( no mayor a 30 días) aplica solo a empleados<br>
                    </p>
                </div>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>
@endsection