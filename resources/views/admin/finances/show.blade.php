@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($finance)
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cover</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <img src="{{ asset("storage/$product->cover") }}" alt=""
                                class="img-responsive img-thumbnail" width="100">
                        </td>
                        <td>{{ $finance->name }}</td>
                        <td>{{ $finance->description }}</td>
                        <td>{{ $finance->quantity }}</td>
                        <td>{{ config('cart.currency_symbol') }} {{ number_format($finance->price)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.finances.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection