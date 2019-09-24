@extends('layouts.front.app')
@section('title', 'Directorio')
@section('content')

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
                        <a class="nav-linkDirectorio nav-link cities active" id="home-tab" data-toggle="tab"
                            href="#bogota" role="tab" aria-controls="home" aria-selected="true"><i
                                class="fa fa-map-marker yellow" aria-hidden="true"></i> Bogotá</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="profile-tab" data-toggle="tab" href="#cali"
                            role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-map-marker yellow"
                                aria-hidden="true"></i>
                            Cali</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#ibague"
                            role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow"
                                aria-hidden="true"></i>
                            Ibagué</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab"
                            href="#manizales" role="tab" aria-controls="contact" aria-selected="false"><i
                                class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Manizales</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab"
                            href="#medellin" role="tab" aria-controls="contact" aria-selected="false"><i
                                class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Medellín</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab"
                            href="#monteria" role="tab" aria-controls="contact" aria-selected="false"><i
                                class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Montería</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#pereira"
                            role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow"
                                aria-hidden="true"></i>
                            Pereira</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab"
                            href="#sincelejo" role="tab" aria-controls="contact" aria-selected="false"><i
                                class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Sincelejo</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab" href="#tunja"
                            role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-map-marker yellow"
                                aria-hidden="true"></i>
                            Tunja</a>
                    </li>
                    <li class="nav-item nav-itemDirectorio ">
                        <a class="nav-linkDirectorio nav-link cities" id="contact-tab" data-toggle="tab"
                            href="#villavicencio" role="tab" aria-controls="contact" aria-selected="false"><i
                                class="fa fa-map-marker yellow" aria-hidden="true"></i>
                            Villavicencio</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-7">
                <div class="tab-content d-flex justify-content-center" id="myTabContent">
                    <div class="tab-pane tab-paneDirectorio fade show active" id="bogota" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="card directorioCard ">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    BOGOTÁ</h5>
                                <p class="card-text directorioCard-text text-center ">



                                    @foreach ($employees as $employee)
                                    @if ($employee->city == 'Bogotá' )
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cll. 17 # 8-62 C.C.
                                    Unicompras
                                    Ofi. 203<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> {{$employee->name }} <br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 2432302<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    {{$employee->email }}<br><br>
                                    @endif
                                    @endforeach

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="cali" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Cali</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra 4 # 12-41 Edificio
                                    Seguros
                                    Bolívar<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> María Nancy Burbano<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3174394020<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotorcali2@creolibranzas.com<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Tatiana Mezú<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3174394020<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotorcali2@creolibranzas.com<br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="ibague" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Ibagué</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra 2 # 12-90<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Diana Acevedo<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3176976163<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotoribague@creolibranzas.com<br><br>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="manizales" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Manizales</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 22 # 19-17 Local
                                    17i<br><br>

                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Marisol Franco<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3175106227<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotormanizales@creolibranzas.com<br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="medellin" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Medellín</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 49 # 50-41 Local
                                    112<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Mónica Carrasquilla<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3153644278<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotormedellin@creolibranzas.com<br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="monteria" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Montería</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 3 N 25-68
                                    Montería<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Erly Judith Gómez<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3166922635 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotormonteria@creolibranzas.com<br><br>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="pereira" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Pereira</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 8 # 20-51<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Olga Jiménez<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3164783089 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    auxiliardecreditopereira@creolibranzas.com<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Silvia Marcela Sánchez<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3164783089 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    auxiliardecreditopereira@creolibranzas.com<br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="sincelejo" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Sincelejo</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cll. 21 # 21-82
                                    Centro<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Yina Sánchez<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3204752087<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotorsincelejo@creolibranzas.com<br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="tunja" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Tunja</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 10 # 20-91 C.C. El
                                    virrey
                                    Local 214<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Ángela María Pacheco<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3204600563<br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    promotortunja@creolibranzas.com<br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-paneDirectorio fade" id="villavicencio" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <div class="card directorioCard">
                            <div class="card-body directorioCardBody">
                                <h5 class="card-title directorioCardTitle text-center"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>
                                    Villavicencio</h5>
                                <p class="card-text directorioCard-text text-center">
                                    <i class="fa fa-building yellow" aria-hidden="true"></i> Cra. 33 # 39-67 Barrio
                                    centro<br><br>
                                    <i class="fa fa-user yellow" aria-hidden="true"></i> Diego Dorado<br>
                                    <i class="fa fa-phone yellow" aria-hidden="true"></i> 3204752084 <br>
                                    <i class="fa fa-envelope yellow" aria-hidden="true"></i>
                                    coordinadorvillavicencio@creolibranzas.com<br><br>
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
