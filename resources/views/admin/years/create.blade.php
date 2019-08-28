@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.years.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <h1>Crear Año Financiero</h1>
                <input type="hidden" name="parent" id="parent" class="form-control" value="1">

                <div class="form-group">
                    <label for="year">Año <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </div>
                        <input type="text" name="year" id="year" placeholder="Año" class="form-control"
                            value="{{ old('year') }}" required>
                    </div>
                </div>
                <input type="hidden" name="status" id="status" class="form-control" value="1">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.years.index') }}" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection