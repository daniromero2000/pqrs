@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h2>{{ $employee->name }}
            </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col">Roles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{ $employee->email }}</td>
                        <td class="text-center">
                            {{ $employee->roles()->get()->implode('name', ', ') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.employees.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection