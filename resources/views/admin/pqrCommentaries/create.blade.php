@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box" >
        <form action="{{ route('admin.pqrCommentaries.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="pqr_id">Cliente </label>
                    <select name="pqr_id" id="status" class="form-control select2">
                        @foreach($pqrs as $pqr)
                        <option value="{{ $pqr->id }}">{{ $pqr->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="commentary_1">Comentario <span class="text-danger">*</span></label>
                    <input type="text" name="commentary_1" id="commentary_1" placeholder="Comentario" class="form-control" value="{{ old('commentary__1') }}"
                        required>
                </div>
                <input type="hidden" name="status" value="1">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.pqrCommentaries.index') }}" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
 
@section('js')
@endsection