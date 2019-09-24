@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.employees.store') }}" method="post" class="form">
            <div class="box-body">
                {{ csrf_field() }}
                <h1>Crear Empleado</h1>
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control"
                            value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                            value="{{ old('email') }}" required>
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
                <div class="form-group">
                    <label for="role">Rol </label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user-o"></i>
                        </div>
                        <select name="role" id="role" class="form-control select2">
                            <option></option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" required>{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="city_id" class="form-group">
                    <label for="subsidiary_id">Sucursal <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <select name="subsidiary_id" id="subsidiary_id" class="form-control" enabled>
                            @foreach($subsidiaries as $subsidiary)
                            <option value="{{ $subsidiary->id }}">{{ $subsidiary->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="control-label">Cargo</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <select class="selectpicker form-control" id="position" name="position">
                            <option>Promotor</option>
                            <option>Coordinador</option>
                        </select>
                    </div>
                </div>
                @include('admin.shared.status-select', ['status' => 0])
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <div class="btn-group">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-default">Regresar</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection