@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h2>{{ $pqr->name }} ({{ $pqr->pqr }}) <p class="text-center label"
                    style="color: #ffffff; background-color: {{ $currentStatus->color }}"
                    class="btn btn-info btn-block">{{ $currentStatus->name }}</p>
            </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Documento Identificación</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col">Teléfono</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{ $pqr->cedula }}</td>
                        <td class="text-center">{{ $pqr->email }}</td>
                        <td class="text-center">{{ $pqr->phone }}</td>

                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Ciudad</th>
                        <th class="text-center" scope="col">Asunto</th>
                        <th class="text-center" scope="col">Mensaje</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{ $city->name }}</td>
                        <td class="text-center">{{ $pqr->asunto }}</td>
                        <td class="text-center">{{ $pqr->mensaje }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    <form action="{{ route('admin.pqrs.destroy', $pqr['id']) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                            <a href="{{ route('admin.pqrs.edit', $pqr['id']) }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-edit"></i> Editar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>Comentarios</h1>
            @if(!$pqrcommentaries->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Comentario</th>
                        <th class="text-center" scope="col">Fecha</th>
                        <th class="text-center" scope="col">Usuario</th>
                    </tr>
                    </t>
                <tbody>
                    @foreach ($pqrcommentaries as $pqrcommentary)
                    <tr>
                        <td class="text-center">{{ $pqrcommentary->commentary_1 }}</td>
                        <td class="text-center">{{  date('M d, Y h:i a', strtotime($pqrcommentary->created_at)) }}</td>
                        <td class="text-center">{{ $pqrcommentary->user }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <span>Aún no tiene comentarios</span><br>
            @endif
            <a href="#myModal" data-toggle="modal" data-target="#commentmodal" <i class="btn btn-primary btn-sm"><i
                    class="fa fa-edit"></i>
                Crear Comentario</a>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.pqrs.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->

    <!-- The Comment Modal -->
    <div id="commentmodal" class="modal fade modalAuth">
        <div class="modal-dialog modal-sm  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Ingresa el comentario</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="box">
                        <form action="{{ route('admin.pqrCommentaries.store') }}" method="post" class="form"
                            enctype="multipart/form-data">
                            <div class="box-body">
                                {{ csrf_field() }}
                                <div class="form-group hidden">
                                    <input type="text" name="pqr_id" id="pqr_id" placeholder="Comentario"
                                        class="form-control" value="{{ $pqr->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="commentary_1">Comentario <span class="text-danger">*</span></label>
                                    <input type="text" name="commentary_1" id="commentary_1" placeholder="Comentario"
                                        class="form-control" value="{{ old('commentary_1') }}" required>
                                </div>
                                <div class="form-group hidden">
                                    <label for="user">Auth<span class="text-danger"></span></label>
                                    <input type="text" name="user" id="user" placeholder="commentauth"
                                        class="form-control" value=" {{ $user->name }} ">
                                </div>
                                <input type="hidden" name="status" value="1">
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="btn-group">

                                    <button type="submit" class="btn btn-primary">Crear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
    <div class="modal-footer">
    </div>
</section>
<!-- /.content -->
<!-- /.content -->
@endsection