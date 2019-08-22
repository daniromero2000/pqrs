@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.roles.store') }}" method="post" class="form">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="display_name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </div>
                        <input type="text" name="display_name" id="display_name" placeholder="Nombre" class="form-control" value="{{ old('display_name') }}"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Descripción <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control" required placeholder="Descripción">{{ old('description') }}</textarea>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <div class="btn-group">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-default">Regresar</a>
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