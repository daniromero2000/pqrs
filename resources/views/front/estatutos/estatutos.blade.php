@extends('layouts.front.app')
@section('title', 'Estatutos')
@section('content')

<body oncopy="return false" oncut="return false" onpaste="return false">
    <div class="container-fluid">
        <div class="row top-buffer">
            <div class="col-md-12 side-nopadding">
                <h1 class="beneficiosTitle text-center block animatable fadeInUp ">Estatutos</h1>
            </div>
        </div>
        <hr>
        <div class="row top-buffer bottom-buffer">
            <div class="col-md-12 text-center">
                <p class="text-center"><strong>Las siguientes son los estatutos de Socomir:</strong></p>
                <object data="{{asset('/pdf/ESTATUTOS SOCOMIR 2015.pdf#toolbar=0&navpanes=0&scrollbar=0')}}" type="application/pdf" width="80%" height="800px">
                    <p>Parece que tu navegador no puede leer PDF</p>
                </object>
            </div>
        </div>
        <hr>
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