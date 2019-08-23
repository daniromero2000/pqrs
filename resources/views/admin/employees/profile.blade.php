@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <form action="{{ route('admin.employee.profile.update', $employee->id) }}" method="post" class="form">
        <input type="hidden" name="_method" value="put"> {{ csrf_field() }}
        <!-- Default box -->
        <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
            <div class="box-body">
                <h1>Editar Perfil</h1>
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control"
                            value="{!! $employee->name ?: old('name')  !!}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                            value="{!! $employee->email ?: old('email')  !!}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control"
                            required>
                    </div>
                </div>
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