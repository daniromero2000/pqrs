@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.finances.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="col-md-8">
                    <h1>Crear Información</h1>
                    <div class="form-group">
                        <label for="name">Mes <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-at"></i>
                            </div>
                            <input type="text" name="name" id="name" placeholder="Mes" class="form-control"
                                value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" id="description" rows="5"
                            placeholder="Descripción" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover">Archivo PDF <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-picture-o"></i>
                            </div>
                            <input type="file" name="cover" id="cover" class="form-control" required>
                        </div>
                        <small class="text-warning">El archivo financiero es necesario</small>
                    </div>

                    <input type="hidden" name="quantity" id="quantity" placeholder="Cantidad" class="form-control"
                        value="1" required>

                    <input type="hidden" name="status" id="status" class="form-control" value="1">
                </div>
                <div class="col-md-4">
                    <h2>Tipo Documento</h2>
                    @include('admin.shared.years', ['years' => $years, 'selectedIdsC' => []])
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.finances.index') }}" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection