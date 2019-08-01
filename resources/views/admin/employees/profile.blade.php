@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <form action="{{ route('admin.employee.profile.update', $employee->id) }}" method="post" class="form">
        <input type="hidden" name="_method" value="put"> {{ csrf_field() }}
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" value="{{ $employee->name }}" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" value="{{ $employee->email }}" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" value="" placeholder="xxxxxx" required>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-default btn-sm">Regresar</a>
                    <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </form>

</section>
<!-- /.content -->
@endsection