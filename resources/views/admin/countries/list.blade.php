@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($countries)
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>Países</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col-md-1">Nombre</th>
                        <th class="text-center" scope="col-md-1">ISO</th>
                        <th class="text-center" scope="col-md-1">ISO-3</th>
                        <th class="text-center" scope="col-md-1">Numcode</th>
                        <th class="text-center" scope="col-md-1">Phone Code</th>
                        <th class="text-center" scope="col-md-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('admin.countries.show', $country->id) }}">{{ $country->name }}</a>
                        </td>
                        <td class="text-center">{{ $country->iso }}</td>
                        <td class="text-center">{{ $country->iso3 }}</td>
                        <td class="text-center">{{ $country->numcode }}</td>
                        <td class="text-center">{{ $country->phonecode }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $countries->links() }}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endif
</section>
<!-- /.content -->
@endsection