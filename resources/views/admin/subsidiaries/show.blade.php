@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($subsidiary)
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h2>{{ $subsidiary->name }} ({{ $subsidiary->city->name }})</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Dirección</th>
                            <th scope="col">Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $subsidiary->address }}</td>
                            <td>{{ $subsidiary->phone }}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
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