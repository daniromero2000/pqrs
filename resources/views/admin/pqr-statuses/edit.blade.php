@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box crud-box">
        <form action="{{ route('admin.pqr-statuses.update', $pqrStatus->id) }}" method="post">
            <div class="box-body">
                <h1>Estados Clientes</h1>
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $PqrStatus->name ?: old('name') }}" placeholder="Nombre"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="color">Color <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-paint-brush"></i>
                        </div>
                        <input class="form-control jscolor {hash:true}" type="text" name="color" id="color" value="{{ $pqrStatus->color ?: old('color') }}"
                            required>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer btn-group">
                <a href="{{ route('admin.pqr-statuses.index') }}" class="btn btn-default">Regresar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
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