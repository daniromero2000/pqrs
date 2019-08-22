@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box crud-box">
        <form action="{{ route('admin.pqr-statuses.store') }}" method="post">
            <div class="box-body">
                <h2>Crear Estado PQRS</h2>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="color">Color <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-paint-brush"></i>
                        </div>
                        <input class="form-control jscolor my-colorpicker1 colorpicker-element" type="text" name="color" id="color" value="{{ old('color') }}"
                            required>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer btn-group">
                <a href="{{ route('admin.pqr-statuses.index') }}" class="btn btn-default">Regresar</a>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection
 
@section('js')
<script src="{{ asset('js/jscolor.min.js') }}" type="text/javascript"></script>
@endsection