@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.pqrs.store') }}" method="post" class="form">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
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
                    <label for="cedula">Documento Identificación <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-id-card"></i>
                        </div>
                        <input type="text" name="cedula" id="cedula" placeholder="Documento Identificación"
                            class="form-control" value="{{ old('cedula') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="">Teléfono <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="phone" required id="phone" placeholder="Teléfono móvil"
                            class="form-control" required>
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group hidden">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control"
                        value="12345678">
                </div>
                <input type="hidden" name="status" id="status" class="form-control" value="1">
                <div class="form-group">
                    <label for="pqr_status_id" class="">Estado <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <select name="cpqr_status_id" id="pqr_status_id" class="form-control select2">
                            @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lead" class="control-label">lead</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <select class="selectpicker form-control" id="lead" name="lead">
                            <option>Facebook</option>
                            <option>WhatsApp</option>
                            <option>Telemercadeo</option>
                            <option>Recontactado</option>
                            <option>Almacén</option>
                            <option>Buscado</option>
                            <option>Add's</option>
                            <option>Agencia</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.pqrs.index') }}" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection