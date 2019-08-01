<div id="footer">
    <footer class="page-footer footer-section font-small blue pt-4">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <h2 class="footer-text">Quíenes Somos</h2> <a href="{{ route('about') }} ">
                        <p class="footer-section text-justify"><strong class="yellow">SOCOMIR</strong> es una persona
                            jurídica del sector cooperativo orientada a la prestación de servicios, clasificada como
                            multiactiva de aportes y crédito, de patrimonio social variable e ilimitado, regida por la
                            legislación cooperativa, los estatutos sociales y vigilada por la Superintendencia de
                            Economía Solidaria</p>
                    </a>
                </div>
                <div class="col-12 col-xs-12 col-sm-4 col-md-3 col-lg-3 col-xl-3 float-left">
                    <div class="footer-menu">
                        <h2 class="footer-text">Información</h2>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right iconFooter" aria-hidden="true"></i><a href="#">
                                    Estatutos</a></li>
                            <hr class="footerStyle">
                            <li><i class="fa fa-angle-right iconFooter" aria-hidden="true"></i><a
                                    href="{{ route('reglamentos') }}"> Reglamentos</a></li>
                            <hr class="footerStyle">
                            <li><i class="fa fa-angle-right iconFooter" aria-hidden="true"></i><a
                                    href="{{ route('libranza') }}"> Conceptos crédito de libranza</a></li>
                            <hr class="footerStyle">
                            <li><i class="fa fa-angle-right iconFooter" aria-hidden="true"></i><a target="_blank"
                                    href="{{asset('/pdf/Informacion-cobranzas-socomir.pdf')}}"> Políticas de cobro</a>
                            </li>
                            <hr class="footerStyle">
                            <li><i class="fa fa-angle-right iconFooter" aria-hidden="true" target="_blank"></i><a
                                    href="{{ route('registroweb') }}"> Actualización de registro</a></li>
                            <hr class="footerStyle">
                            <li><i class="fa fa-angle-right iconFooter" aria-hidden="true" target="_blank"></i><a
                                    href="{{ route('convenios') }}"> Convenios</a></li>
                            <hr class="footerStyle">
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <h2 class="footer-text">Contacto</h2>
                    <p><i class="fa fa-home iconFooter" aria-hidden="true" target="_blank"></i> Cra. 7 # 156-10 Torre
                        Krystal of 2303 Bogotá<br><br><i class="fa fa-phone iconFooter" aria-hidden="true"></i> 4842121<br><br>
                        <i class="fa fa-envelope iconFooter" aria-hidden="true"></i> socomir@creolibranzas.com</p>
                </div>
            </div>
        </div>
    </footer>
</div>