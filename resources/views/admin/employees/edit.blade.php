@extends('layouts.admin.app')
@section('content')
<script src="https://kit.fontawesome.com/c1313463c5.js"></script>
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.employees.update', $employee->id) }}" method="post" class="form">
            <div class="box-body">
                {{ csrf_field() }}
                <h1>Editar Empleado</h1>
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{!! $employee->name ?: old('name')  !!}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{!! $employee->email ?: old('email')  !!}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Telefono <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <input type="text" name="phone" id="phone" placeholder="telefono" class="form-control" value="{!! $employee->phone ?: old('phone') !!}" >
                    </div>
                </div>
              


                <div class="form-group">
                    <label for="roles">Rol </label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user-o"></i>
                        </div>
                        <select name="roles[]" id="roles" class="form-control select2" multiple="multiple">
                            @foreach($roles as $role)
                            <option @if(in_array($role->id, $selectedIds))selected="selected" @endif value="{{ $role->id }}">{{ $role->display_name }}</option>
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
                            <option @if($employee->subsidiary_id == $subsidiary->id) selected @endif value="{{ $subsidiary->id }}">{{ $subsidiary->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="control-label">Cargo</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-briefcase yellow"></i>
                        </div>
                        <select class="selectpicker form-control" id="position" name="position">
                            <option @if($employee->position == 'Promotor') selected @endif>Promotor</option>
                            <option @if($employee->position == 'Coordinador') selected @endif>Coordinador</option>
                            <option @if($employee->position == 'Auxiliar de credito') selected @endif>Auxiliar de credito</option>
                        </select>
                    </div>
                </div>

                @include('admin.shared.status-select', ['status' => $employee->status])
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-default btn-sm">Regresar</a>
                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection