@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <h1>Cliente</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Documento Identificación</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">lead</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pqr->cedula }}</td>
                        <td>{{ $pqr->name }}</td>
                        <td>{{ $pqr->email }}</td>
                        <td>{{ $pqr->lead }}</td>
                        <td>{{ $pqr->phone }}</td>
                        <td>
                            <p class="text-center label"
                                style="color: #ffffff; background-color: {{ $currentStatus->color }}"
                                class="btn btn-info btn-block">{{ $currentStatus->name }}</p>
                        </td>
                        <td>
                            <form action="{{ route('admin.pqrs.destroy', $pqr['id']) }}" method="post"
                                class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ route('admin.pqrs.edit', $pqr['id']) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="box-body">
            <h1>Dirección</h1>
            @if(!$addresses->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Dirección</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Departamento</td>
                        <th scope="col">Opciones</td>
                    </tr>
                    </th>
                </thead>
                @foreach ($addresses as $address)
                <tr>
                    <td>{{ $address->address_1 }}</td>
                    <td>{{ $address->city->name }}</td>
                    <td>{{ $address->province->name }}</td>
                    <td>
                        <form action="{{ route('admin.addresses.destroy', $address->id) }}" method="post"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <div class="btn-group">
                                <a href="{{ route('admin.addresses.edit', $address->id) }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                <button onclick="return confirm('¿Estás Seguro?')" type="submit"
                                    class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                </th>
            </table>
            @else
            <span>Aún no tiene dirección</span><br>
            @endif
            <a href="{{ route('admin.addresses.create', ['id' => $pqr->id]) }}" class="btn btn-primary btn-sm"><i
                    class="fa fa-edit"></i>
                Crear Dirección</a>

        </div>
        <div class="box-body">
            <h1>Artículos Compraventa</h1>
            @if(!$items->isEmpty())
            @include('admin.shared.items', ['items' => $items])
            @else
            <span>Aún no tiene dirección</span><br>
            @endif
            <a href="{{ route('admin.items.create', ['id' => $pqr->id]) }}" class="btn btn-primary btn-sm"><i
                    class="fa fa-edit"></i>
                Crear Artículo Compraventa</a>
        </div>
        <div class="box-body">
            @if(!$orders->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h1>Compras</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Referencia</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->reference}}</td>
                                <td><a title="Show order"
                                        href="{{ route('admin.orders.show', $order->id) }}">{{ date('M d, Y h:i a', strtotime($order->created_at)) }}</a>
                                </td>
                                <td>
                                    <span
                                        class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency_symbol') }}
                                        {{ number_format($order->total )}}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @endif
        </div>
        <div class="box-body">
            <h1>Comentarios</h1>
            @if(!$commentaries->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Comentario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Usuario</th>
                    </tr>
                    </t>
                <tbody>
                    @foreach ($commentaries as $comentary)
                    <tr>
                        <td>{{ $comentary->commentary_1 }}</td>
                        <td>{{  date('M d, Y h:i a', strtotime($comentary->created_at)) }}</td>
                        <td>{{ $comentary->user }}</td>
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
                        <form action="{{ route('admin.customerCommentaries.store') }}" method="post" class="form"
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