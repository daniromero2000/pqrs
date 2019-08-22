@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box register-box">
        <form action="{{ route('admin.subsidiaries.update', $subsidiary->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                <input type="hidden" name="_method" value="put"> {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </div>
                        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{!! $subsidiary->name ?: old('name')  !!}"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Dirección <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <input type="text" name="address" id="address" placeholder="Dirección" class="form-control" value="{!! $subsidiary->address ?: old('address')  !!}"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Teléfono <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="phone" id="phone" placeholder="Teléfono" class="form-control" value="{!! $subsidiary->phone ?: old('phone')  !!}"
                            required>
                    </div>
                </div>
                <div id="cities" class="form-group">
                    <label for="city_id">Ciudad </label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <select name="city_id" id="city_id" class="form-control">
                        @foreach($cities as $city)
                        @if($city->id == $cityId)
                        <option selected="selected" value="{{ $city->id }}">{{ $city->name }}</option>
                        @else
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.subsidiaries.index') }}" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection