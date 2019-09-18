@extends('layouts.front.app')
@section('title', 'Tarifas')
@section('content')

<body oncopy="return false" oncut="return false" onpaste="return false">
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-md-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">Tasas y Tarifas</h1>
            </div>
        </div>
        <hr>
        <div class="row top-buffer bottom-buffer text-center">
            <div class="col-md-12 col-lg-12">
                <p class="text-center"><strong>Las siguientes son las tarifas de nuestros servicios:</strong></p>
                <object data="{{asset("storage/$finance->cover")}}#toolbar=0&navpanes=0&scrollbar=0"
                    type="application/pdf" width="80%" height="800px" frameborder="0">
                    <p>Parece que tu navegador no puede leer archivos PDF</a></p>
                </object>
            </div>
        </div>
        <hr>
    </div>
    <!-- barra de interes -->
    <div class="container-fluid top-buffer my-5">
    <div class="row img-row d-flex justify-content-center top-buffer">
        <div
            class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 top-buffer d-flex justify-content-center block animatable fadeInUp">
            <h2 class="interesInfoTitle text-center">Información de interés</h2>
        </div>
        <div
            class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 top-buffer d-flex justify-content-center block animatable fadeInUp">
            <a href="{{ route('informacionfinanciera') }}"><img class="img-fuid imgSlideIni" src="{{asset('/img/images-13.png')}}"
                    alt="First slide"></a>
        </div>
        <div
            class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 top-buffer d-flex justify-content-center block animatable fadeInUp">
            <a href="{{ route('pqrs.create') }}"><img class="img-fuid imgSlideIni" src="{{asset('/img/images-14.png')}}" alt="First slide"></a>
        </div>
        <div
            class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 top-buffer d-flex justify-content-center block animatable fadeInUp">
            <a href="{{ route('productosservicios') }}"><img class="img-fuid imgSlideIni" src="{{asset('/img/images-15.png')}}"
                    alt="First slide"></a>
        </div>
    </div>
</div>
    <script type="text/javascript">
        document.onmousedown = disableRightclick;
        var message = "No esta permitida esta funcionalidad";
        function disableRightclick(evt){
            if(evt.button == 2){
                alert(message);
                return false;    
            }
        }
     


document.getElementById("toolbarContainer").disabled = true;

    </script>

</body>

</html>
@endsection