@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.years.update', $year->id) }}" method="post" class="form"
            enctype="multipart/form-data">
            <div class="box-body">
                <input type="hidden" name="_method" value="put"> {{ csrf_field() }}
                <h1>Editar Información</h1>
                <div class="form-group">
                    <label for="Year">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </div>
                        <input type="text" name="year" id="year" placeholder="Nombre" class="form-control"
                            value="{!! $year->year ?: old('year')  !!}" required>
                    </div>
                </div>
                               <input type="hidden" name="status" id="status" class="form-control" value="1">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.years.index') }}" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection