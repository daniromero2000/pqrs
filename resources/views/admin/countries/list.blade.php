<<<<<<< HEAD
=======

>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
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
                        <th scope="col-md-1">Nombre</th>
                        <th scope="col-md-1">ISO</th>
                        <th scope="col-md-1">ISO-3</th>
                        <th scope="col-md-1">Numcode</th>
                        <th scope="col-md-1">Phone Code</th>
                        <th scope="col-md-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                    <tr>
                        <td>
                            <a href="{{ route('admin.countries.show', $country->id) }}">{{ $country->name }}</a>
                        </td>
                        <td>{{ $country->iso }}</td>
                        <td>{{ $country->iso3 }}</td>
                        <td>{{ $country->numcode }}</td>
                        <td>{{ $country->phonecode }}</td>
                        <td>
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