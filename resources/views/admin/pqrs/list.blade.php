@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->

    <div class="box">
        <div class="box-body">
            <h1>Pqrs Socomir</h1>
            <div class="row">
                <div class="col-md-5">
                    @include('layouts.search', ['route' => route('admin.pqrs.index')])
                </div>
            </div>
            @if($pqrs)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ingreso</th>
                        <th scope="col">Lead</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pqrs as $pqr)
                    <tr>
                        <td>{{ date('M d, Y h:i a', strtotime($pqr['created_at'])) }}</td>
                        <td>{{ $pqr['lead'] }}</td>
                        <td>
                           

                            <a href="{{ route('admin.pqrs.show', $pqr['id']) }}">{{ $pqr['name'] }}</a>
                        </td>
                        <td>{{ $pqr['phone'] }}</td>
                        <td>
                            <p class="text-center label"
                                style="color: #ffffff; background-color: {{ $pqr->pqr_status_id->color }}">
                                </p>
                        </td>
                        <!-- <td>
    @include('layouts.status', ['status' => $pqr['status']])</td>-->
                        <td>
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