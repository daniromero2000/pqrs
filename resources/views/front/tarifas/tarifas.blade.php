@extends('layouts.front.app')
@section('title', 'Tarifas')
@section('content')

<body>
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-md-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">Tasas y Tarifas</h1>
            </div>
        </div>
        <hr>
               <div class="row top-buffer bottom-buffer">
                <div class="col-md-12">
                    <p class="text-center"><strong>Las siguientes son las tarifas de nuestros servicios:</strong></p>
                    <object data="{{asset('/pdf/7. Cartelera SOCOMIR JULIO 2019.pdf')}}" type="application/pdf" width="100%" height="800px"> 
                        <p>It appears you don't have a PDF plugin for this browser.
                         No biggie... you can <a href="resume.pdf">click here to
                        download the PDF file.</a></p>  
                      </object>
                </div>
            </div>
      
        <hr>
    </div>
</body>

</html>
@endsection