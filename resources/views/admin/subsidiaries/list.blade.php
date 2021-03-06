@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($subsidiaries)
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>Sucursales Socomir</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" class="col-md-2">Nombre</th>
                        <th class="text-center" class="col-md-2">Dirección</th>
                        <th class="text-center" class="col-md-2">Teléfono</th>
                        <th class="text-center" class="col-md-2">Ciudad</th>
                        <th class="text-center" class="col-md-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subsidiaries as $subsidiary)
                    <tr>
                        <td class="text-center">
                            <a
                                href="{{ route('admin.subsidiaries.show', $subsidiary->id) }}">{{ $subsidiary->name }}</a>
                        </td>
                        <td class="text-center">{{ $subsidiary->address}}</td>
                        <td class="text-center">{{ $subsidiary->phone}}</td>
                        <td class="text-center">{{ $subsidiary->city->name}}</td>
                        <td class="text-center">
                            @if($user->hasRole('superadmin'))
                            <form action="{{ route('admin.subsidiaries.destroy', $subsidiary->id) }}" method="post"
                                class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ route('admin.subsidiaries.edit', $subsidiary->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                    <button onclick="return confirm('¿Estás Seguro?')" type="submit"
                                        class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button>
                                </div>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $subsidiaries->links() }}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection