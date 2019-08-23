@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.finances.update', $finance->id) }}" method="post" class="form"
            enctype="multipart/form-data">
            <div class="box-body">
                <div class="row">
                    {{ csrf_field() }}
                    <h1>Editar Información Financiera</h1>
                    <input type="hidden" name="_method" value="put">
                    <div class="col-md-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="tablist">
                            <li role="presentation" @if(!request()->has('combination')) class="active" @endif><a
                                    href="#info" aria-controls="home" role="tab" data-toggle="tab">Info</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" id="tabcontent">
                            <div role="tabpanel" class="tab-pane @if(!request()->has('combination')) active @endif"
                                id="info">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2>{{ ucfirst($finance->name) }}</h2>
                                        <div class="form-group">
                                            <label for="name">Nombre <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-at"></i>
                                                </div>
                                                <input type="text" name="name" id="name" placeholder="Nombre"
                                                    class="form-control" value="{!! $finance->name !!}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Descripción <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" id="description" rows="5"
                                                required
                                                placeholder="Descripción">{!! $finance->description  !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <img src="{{ asset("storage/$finance->cover") }}" alt=""
                                                        class="img-responsive img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"></div>
                                        <div class="form-group">
                                            <label for="cover">Cover </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-picture-o"></i>
                                                </div>
                                                <input type="file" name="cover" id="cover" class="form-control">
                                            </div>
                                            <small class="text-warning">El cover del producto es obligatorio</small>
                                        </div>


                                        <input type="hidden" name="status" id="status" class="form-control" value="1">
                                        <!-- /.box-body -->
                                    </div>
                                    <div class="col-md-4">
                                        <h2>Categorias</h2>
                                        @include('admin.shared.years', ['years' => $years, 'ids' =>
                                        $finance])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="box-footer">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.finances.index') }}"
                                                class="btn btn-default btn-sm">Regresar</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection