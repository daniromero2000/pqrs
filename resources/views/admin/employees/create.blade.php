<<<<<<< HEAD
@extends('layouts.admin.app') 
=======
@extends('layouts.admin.app')
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
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
<<<<<<< HEAD
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{{ old('name') }}" required>
=======
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control"
                            value="{{ old('name') }}" required>
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
<<<<<<< HEAD
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required>
=======
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                            value="{{ old('email') }}" required>
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
<<<<<<< HEAD
                            <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </div>
                    <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control" required>
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
=======
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
                            <i class="fa fa-user"></i>
                        </div>
                        <select name="role" id="role" class="form-control select2">
                            <option></option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" required>{{ ucfirst($role->name) }}</option>
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
                            @endforeach
                        </select>
                    </div>
                </div>
<<<<<<< HEAD
    @include('admin.shared.status-select', ['status' => 0])
=======
                @include('admin.shared.status-select', ['status' => 0])
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
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