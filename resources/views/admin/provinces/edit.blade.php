@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.countries.provinces.update', [$countryId, $province->id]) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                <input type="hidden" name="_method" value="put"> {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                    <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{!! $province->name ?: old('name')  !!}"
                        required>
                </div>
            </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.countries.show', $countryId) }}" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection