@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <h1>Comentarios Clientes</h1>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="col">Comentario </th>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>{{ $pqrcommentary->commentary_1 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.pqrCommentaries.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection