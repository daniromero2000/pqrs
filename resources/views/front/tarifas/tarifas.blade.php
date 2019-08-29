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
                <object data="{{asset("storage/$finance->cover")}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="80%"
                    height="800px" frameborder="0">
                    <p>Parece que tu navegador no puede leer archivos PDF</a></p>
                </object>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>
@endsection