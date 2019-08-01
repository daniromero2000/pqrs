@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($subsidiary)
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $subsidiary->name }}</td>
                        <td>{{ $subsidiary->address }}</td>
                        <td>{{ $subsidiary->phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if(!$products->isEmpty())
        <div class="box-body">
            <h2>Productos</h2>
    @include('admin.shared.products', ['products' => $products])
        </div>
        @endif
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.subsidiaries.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection