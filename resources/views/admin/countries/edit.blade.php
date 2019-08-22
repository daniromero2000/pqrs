@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box crud-box">
        <form action="{{ route('admin.countries.update', $country->id) }}" method="post" class="form"
            enctype="multipart/form-data">
            <div class="box-body">
                <input type="hidden" name="_method" value="put"> {{ csrf_field() }}
                <h1>Editar País</h1>
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control"
                            value="{!! $country->name ?: old('name')  !!}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="iso">ISO <span class="text-danger">*</span></label>
                    <input type="text" name="iso" id="iso" placeholder="ISO" class="form-control"
                        value="{!! $country->iso ?: old('iso')  !!}" required>
                </div>
                <div class="form-group">
                    <label for="iso3">ISO-3 </label>
                    <input type="text" name="iso3" id="iso3" placeholder="ISO 3" class="form-control"
                        value="{!! $country->iso3 ?: old('iso3')  !!}" required>
                </div>
                <div class="form-group">
                    <label for="numcode">Numcode </label>
                    <input type="text" name="numcode" id="numcode" placeholder="ISO 3" class="form-control"
                        value="{!! $country->numcode ?: old('numcode')  !!}" required>
                </div>
                <div class="form-group">
                    <label for="phonecode">Phone code <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon">+</span>
                        <input type="text" name="phonecode" id="phonecode" placeholder="Phone code" class="form-control"
                            value="{!! $country->phonecode ?: old('phonecode')  !!}" required>
                    </div>
                </div>
                <input type="hidden" name="status" id="status" class="form-control" value="1">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.countries.index') }}" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection