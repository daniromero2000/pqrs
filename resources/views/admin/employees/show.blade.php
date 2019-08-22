@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box crud-box">
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
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