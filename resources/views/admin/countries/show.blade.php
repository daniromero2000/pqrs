@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="col-md-2">Nombre</th>
                        <th scope="col-md-2">ISO</th>
                        <th scope="col-md-2">ISO-3</th>
                        <th scope="col-md-2">Numcode</th>
                        <th scope="col-md-2">Phone Code</th>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->iso }}</td>
                        <td>{{ $country->iso3 }}</td>
                        <td>{{ $country->numcode }}</td>
                        <td>{{ $country->phonecode }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="box-body">
    @include('admin.shared.provinces', ['country' => $country->id])
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.countries.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection