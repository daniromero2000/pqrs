@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($year)
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        @if(!$years->isEmpty())
        <div class="box-body">
            <h2>Listado PDF's Años financieros y Tarifas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Año</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($years as $cat)
                    <tr>
                        <td><a href="{{route('admin.years.show', $cat->id)}}">{{ $cat->year }}</a></td>
                        <td><a class="btn btn-primary" href="{{route('admin.years.edit', $cat->id)}}"><i
                                    class="fa fa-edit"></i> Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif @if(!$finances->isEmpty())
        <div class="box-body">
            <h2>Información</h2>
            @include('admin.shared.finances', ['finances' => $finances])
        </div>
        @endif
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.years.show', 1) }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection