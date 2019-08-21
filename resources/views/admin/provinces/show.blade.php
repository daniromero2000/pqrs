@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($province)
    <div class="box">
        <div class="box-body">
            <h1>Departamentos</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $province->name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.countries.provinces.edit', [$countryId, $province->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="box-body">
            <h2>Ciudades / Municipios</h2>
    @include('admin.shared.cities')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.countries.show', $countryId) }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection