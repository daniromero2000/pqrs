@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($year)
    <div class="box">
        <div class="box-body">
            <h1>Categorias</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cover</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $year->name }}</td>
                        <td>{{ $year->description }}</td>
                        <td>
                            @if(isset($year->cover))
                            <img src="{{asset(" storage/$year->cover")}}" alt="category image" class="img-thumbnail"
                                width="100"> @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if(!$years->isEmpty())
        <hr>
        <div class="box-body">
            <h2>Sub Categorias</h2>
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
            <h2>Products</h2>
            @include('admin.shared.finances', ['finances' => $finances])
        </div>
        @endif
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.years.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection