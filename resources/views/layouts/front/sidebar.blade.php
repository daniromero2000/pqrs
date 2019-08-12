<div class="wrapper">
    <nav id="sidebar">
        <div class="container-fluid top-buffer">
            <div class="sidebar-header">
                <h2 class="tituloStore">Información Financiera</h2>
                <div class="d-flex justify-content-center d-flex align-items-center d-xl-none"> <button type="button"
                        id="sidebarCollapseClose" class="btn btn-outline-danger btn-sm"> <i class="fa fa-times"></i>
                        <span>Cerrar</span> </button></div>
            </div>
            <ul class="list-unstyled components">
                <li> @include('layouts.front.year-nav')</li>
            </ul>
        </div>
    </nav>
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a><span class="divider">/</span></li>
            <li><a href="{{ route('informacionfinanciera') }}"> Información Financiera</a><span class="divider">/</span>
            </li>
            @if(isset($year))<li><a href="{{ route('front.year.slug', $year->slug) }}">{{ $year->year }}</a><span
                    class="divider">/</span></li> @endif
        </ul>




        <div class="container-fluid d-flex justify-content-center d-flex align-items-center d-xl-none top-buffer">
            <button type="button" id="sidebarCollapse" class="btn btn-outline-danger btn-sm"> <i class="fa fa-gift">
                    Info Financiera</i> <span>Cerrar</span> </button></div>
        <div class="row d-flex justify-content-center top-buffer">
        </div> @yield('content1')

        <div id="bannerInicial" class="container-fluid bottom-buffer">
            <div class="row">
                <div
                    class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 side-nopadding d-flex justify-content-center">
                    <img class="img-fluid imgBanner" src="{{asset('/img/BANNER-11.png')}}" alt="Crédito para todos">
                </div>
            </div>
        </div>
    </div>
</div>