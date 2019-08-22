@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.pqrs.update', $pqr->id) }}" method="post" class="form">
            <div class="box-body">
                {{ csrf_field() }}
                <h1>Editar PQR</h1>
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control"
                            value="{!! $pqr->name ?: old('name')  !!}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                            value="{!! $pqr->email ?: old('email')  !!}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cedula">Documento Identificación <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-id-card"></i>
                        </div>
                        <input type="text" name="cedula" id="cedula" placeholder="Documento Identificación"
                            class="form-control" value="{!! $pqr->cedula ?: old('cedula')  !!}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="phone" id="phone" placeholder="Teléfono" class="form-control"
                            value="{!! $pqr->phone ?: old('email')  !!}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pqr_status_id">Estado <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <select name="pqr_status_id" id="pqr_status_id" class="form-control select2">
                            @foreach($statuses as $status)
                            <option @if($currentStatus->id == $status->id) selected="selected" @endif
                                value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="hidden" name="status" id="status" class="form-control" value="1">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.pqrs.index') }}" class="btn btn-default btn-sm">Regresar</a>
                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection