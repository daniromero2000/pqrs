@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->

    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>PQRS Socomir</h1>
            <div class="row">
                <div class="col-md-5">
                    @include('layouts.search', ['route' => route('admin.pqrs.index')])
                </div>
            </div>
            @if($pqrs)
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Ingreso</th>
                        <th class="text-center" scope="col">Nombre</th>
                        <th class="text-center" scope="col">Teléfono</th>
                        <th class="text-center" scope="col">Tipo de PQR</th>
                        <th class="text-center" scope="col">Estado</th>
                        <th class="text-center" scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pqrs as $pqr)
                    <tr>
                        <td class="text-center">{{ date('M d, Y h:i a', strtotime($pqr['created_at'])) }}</td>
                        <td class="text-center">
                           {{ $pqr['name'] }}
                        </td>
                        <td class="text-center">{{ $pqr['phone'] }}</td>
                        <td class="text-center"> <a href="{{ route('admin.pqrs.show', $pqr['id']) }}">{{ $pqr['pqr'] }}</a></td>

                        <td class="text-center">
                            <p class="text-center label"
                                style="color: #ffffff; background-color: {{ $pqr->pqr_status_id->color }}">
                                {{ $pqr->pqr_status_id->name }}
                            </p>
                        </td>
                        <!-- <td>
    @include('layouts.status', ['status' => $pqr['status']])</td>-->
                        <td class="text-center">
                            <form action="{{ route('admin.pqrs.destroy', $pqr['id']) }}" method="post"
                                class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    @if($user->hasPermission('delete-pqr')) <button
                                        onclick="return confirm('¿Estás Seguro?')" type="submit"
                                        class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button> @endif
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pqrs->links() }}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection