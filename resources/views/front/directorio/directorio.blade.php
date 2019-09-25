@extends('layouts.front.app')
@section('title', 'Directorio')
@section('content')
<script src="https://kit.fontawesome.com/c1313463c5.js"></script>
<body>
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-md-12 d-flex justify-content-center">
                <img class="img top-buffer" src="{{asset('/img/images-02.png')}}" alt="Crédito para todos">
            </div>
        </div>
        <div class="row top-buffer">
            <div class="col-md-12 d-flex justify-content-center">
                <p class="text-center"><strong>Encuentra asesoría en cualquiera de nuestras sucursales en las diferentes
                        ciudades </strong></p>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 d-flex justify-content-center">
                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities active" id="home-tab" data-toggle="tab" href="#bogota" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-map-marker yellow" aria-hidden="true"></i> Bogotá</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="profile-tab" data-toggle="tab" href="#cali" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Cali</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#ibague" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Ibagué</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#manizales" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Manizales</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#medellin" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Medellín</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#monteria" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Montería</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#pereira" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Pereira</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#sincelejo" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Sincelejo</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#tunja" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Tunja</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#villavicencio" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Villavicencio</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-7">
                <div class="tab-content d-flex justify-content-center" id="myTabContent">
                    <div class="tab-pane tab-paneDirectorio fade show active" id="bogota" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card directorioCard ">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    BOGOTÁ</h5>
                                <p class="card-text directorioCard-text text-center ">

                                <i class="fa fa-building yellow" aria-hidden="true"></i> Cll. 17 # 8-62 C.C.
                                    Unicompras
                                    Ofi. 203<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Nubia Esperanza Gonzalez Riera<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 2432302 - 3176975995<br>
                                    <i class="fa fa-envelope yellow " aria-hidden="true"></i> coordinadorcentro@creolibranzas.com
                                    <br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Fernando Herrera Dicel<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 2432302 - 3134706952<br>
                                    <i class="fa fa-envelope yellow " aria-hidden="true"></i> promotorcentro2@creolibranzas.com
                                    <br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> James Edwin Muñoz<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 2432302 - 3134706952<br>
                                    <i class="fa fa-envelope yellow " aria-hidden="true"></i> promotorcentro@creolibranzas.com
                                    <br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Felipe Sinistera <br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 2432302 - 3134706952<br>
                                    <i class="fa fa-envelope yellow " aria-hidden="true"></i> promotorcentro3@creolibranzas.com
                                    <br><br>
                               
                                    
                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 7:30 AM A 5:00 PM
                                    <!-- @foreach ($employees as $employee)
                                    @if ($employee->city == 'Bogotá' ) -->
                                  
                                    <!-- @endif
                                    @endforeach -->

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="cali" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Cali</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra 4 # 12-41 Edificio
                                    Seguros Bolívar<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Eliana Ocampo Castro<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador <br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 8960499 - 3128429989<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadorcali@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Maria Nancy Burbano Ramos <br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 8960499 - 3174394020
<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotorcali2@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Tatiana Mezú Romero<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 8960499 - 3174394020<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotorcali@creolibranzas.com<br><br>
                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 7:30 AM A 5:00 PM<br>
                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="ibague" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Ibagué</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i>Cr 2 # 12 - 90 centro, almacen oportunidades <br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Maria Nancy Fierro Rubio<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador <br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 2761913 - 3164536024<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadoribague@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Diana Yulietht Acevedo Yanquen  <br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 2761913 - 3164536024<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotoribague@creolibranzas.com <br><br>
                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes:  8:30 AM A 6:00 PM <br> Sabados: 9:00 AM A 1:00 PM

                                    <br>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="manizales" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Manizales</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cr 22 # 19-17 Local  17 I CC la  22<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Diana Alejandra Diaz Ramirez<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador <br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 8828990 - 3214901941<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadormanizales@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Marisol Franco Osorio <br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 8828990 - 3175106227<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotormanizales@creolibranzas.com<br><br>
                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 8:00 AM A 6:00 PM <br> Sabados:  9:00 AM A 1:00 PM
                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="medellin" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Medellín</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 49 # 50-41 Local
                                    112<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Lina marcela Grisales <br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador <br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 5113559 - 3204599822<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadormedellin@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Monica Maria Carrasquilla <br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 5113559 - 3153644278<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotormedellin@creolibranzas.com<br><br>
                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 8:00 AM A 5:30 PM
                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="monteria" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Montería</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 3 N 25-68
                                    Montería<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Veverly RamosS Calonge<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 7890247 - 3214903133 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadormonteria@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Erly Judith Gómez<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 7890247 - 3166922635 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotormonteria@creolibranzas.com<br><br>

                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 8:00 AM A 5:30 PM <br> Sabados: 9:00 AM A 1:00 PM
                                    <br>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="pereira" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Pereira</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 8 # 20-51<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Cristhian David Acosta<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador <br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 3358652 - 3203139307
 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                   coordinadorpereira@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Olga Lucia Jimenez<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 3358652 - 3164783089 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    auxiliardecreditopereira@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Silvia Marcela Sanchez<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 3358652 - 3164783089 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    auxiliardecreditopereira2@creolibranzas.com<br><br>

                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 8:30 AM A 6:00 PM <br> Sabados: 9:00 AM A 1:00 PM

                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="sincelejo" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Sincelejo</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cll. 21 # 21-82
                                    Centro<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Yina sanchez santos<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i>Coordinador<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 2814555 - 3173171704<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadorsincelejo@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Yessica Maria Hernandez Henrriquez<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Auxiliar de credito<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 2814555 - 3204752087<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotorsincelejo@creolibranzas.com<br><br>

                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 8:00 AM A 5:30 PM <br> Sabados: 9:00 AM A 1:00 PM

                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="tunja" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Tunja</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 10 # 20-91 C.C. El
                                    virrey
                                    Local 214<br><br>
                                    
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Maria Andrea Briceño Rodriguez<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador <br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 7401719 - 3127770034<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadortunja@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Angela Maria Pacheco Molina<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Promotor<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 7401719 - 3204600563<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotortunja@creolibranzas.com<br><br>

                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 8:00 AM A 5:30 PM <br> Sabados: 9:00 AM A 1:00 PM

                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="villavicencio" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Villavicencio</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 33 # 39-67 Barrio
                                    centro<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Diego Dorado Batidas<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Coordinador <br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 6628990 - 3204752084<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadorvillavicencio@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Genny Paola Basilio Hoyos<br>
                                    <i class="fa fa-briefcase yellow" aria-hidden="true"></i> Auxiliar de credito<br>
                                    <i class="fas fa-phone-alt yellow" aria-hidden="true"></i> 6628990 - 3176976018 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotorvillavicencio@creolibranzas.com<br><br>
                                    <i class="fas fa-calendar-alt yellow" aria-hidden="true"></i> Horarios de atención:<br> Lunes - Viernes: 7:30 AM A 5:00 PM
                                    <br>
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-8 -->
        </div>
    </div>  
    <hr>
    @include('layouts.front.slideInicial')
    <!-- /.container -->
</body>

</html>
@endsection