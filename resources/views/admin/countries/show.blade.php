@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h2>{{ $country->name }}
            </h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="text-center" scope="col-md-2">ISO</th>
                        <th class="text-center" scope="col-md-2">ISO-3</th>
                        <th class="text-center" scope="col-md-2">Numcode</th>
                        <th class="text-center" scope="col-md-2">Phone Code</th>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td class="text-center">{{ $country->iso }}</td>
                        <td class="text-center">{{ $country->iso3 }}</td>
                        <td class="text-center">{{ $country->numcode }}</td>
                        <td class="text-center">{{ $country->phonecode }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h2>Departamentos</h2>
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