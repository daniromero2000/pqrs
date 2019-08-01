@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($commentaries)
    <div class="box">
        <div class="box-body">
            <h1>Comentarios Clientes</h1>
    @include('layouts.search', ['route' => route('admin.pqrCommentaries.index')])
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Comentario </th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commentaries as $commentary)
                    <tr>
                        <td>{{ $commentary->commentary_1 }}</td>
                        <td>
                            <form action="{{ route('admin.pqrCommentaries.destroy', $commentary->id) }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ route('admin.pqrCommentaries.edit', $commentary->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                    <button onclick="return confirm('¿Estás Seguro?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($commentaries instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">{{ $commentaries->links() }}</div>
                </div>
            </div>
            @endif
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @else
    <div class="box">
        <div class="box-body">
            <p class="alert alert-warning">No se encontraron direcciones.</p>
        </div>
    </div>
    @endif
</section>
<!-- /.content -->
@endsection