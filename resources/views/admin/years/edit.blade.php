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
                <h1>Editar Año Financiero</h1>
               
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control"
                            value="{!! $year->name ?: old('name')  !!}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Descripción <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="description" id="description" rows="5" required
                        placeholder="Descripción">{!! $year->description ?: old('description')  !!}</textarea>
                </div>
                @if(isset($year->cover))
                <div class="form-group">
                    <img src="{{ asset(" storage/$year->cover") }}" alt="" class="img-responsive" width="100">
                    <br />
                    <a onclick="return confirm('¿Estás Seguro?')"
                        href="{{ route('admin.category.remove.image', ['category' => $year->id]) }}"
                        class="btn btn-danger">Quitar Imagen?</a>
                </div>
                @endif
                <div class="form-group">
                    <label for="cover">Imagen <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-picture-o"></i>
                        </div>
                        <input type="file" name="cover" id="cover" class="form-control" required>
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