<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top flex-lg-column align-items-start">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-lg-flex align-self-start d-flex align-items-end">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content"
                    aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{asset('/img/logo.png')}}"
                        alt="Socomir"></a>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 d-lg-flex justify-content-end">
                <a class=" btn" href="{{ route('login') }}"><i class="fa fa-user yellow" aria-hidden="true"></i> Iniciar
                    Sesión</a>
                <a class=" btn" href="{{ route('register') }}"><i class="fa fa-sign-in yellow" aria-hidden="true"></i>
                    Registrarse</a>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-colapseWidth d-lg-flex justify-content-center" id="nav-content">
            <ul class="nav navbar-nav ">
                <li class="nav-item "> <a class="nav-link  @php echo $activeHome @endphp"
                        href="{{ route('home') }}">Inicio</a></span>
                </li>
                <li class="nav-item"> <a class="nav-link @php echo $activeQuienes @endphp"
                        href="{{ route('about') }}">Quíenes Somos</a></span>
                </li>
                <li class="nav-item"> <a class="nav-link  @php echo $activeAsociarse @endphp"
                        href="{{ route('asociarse') }}">Cómo Asociarse</a></span></li>
                <li class="nav-item"> <a class="nav-link  @php echo $activeBeneficios @endphp"
                        href="{{ route('beneficios') }}">Beneficios</a></span></li>
                <li class="nav-item"> <a class="nav-link  @php echo $activeTasas @endphp"
                        href="{{ route('tarifas') }}">Tasas y Tarifas</a></span></li>
                <li class="nav-item"> <a class="nav-link @php echo $activeDirectorio @endphp"
                        href="{{ route('directorio') }}">Directorio</a></span></li>
            </ul>
        </div>
    </nav>
</header>