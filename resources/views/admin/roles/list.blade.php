@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if(!$roles->isEmpty())
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>Roles Empleados</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>
                            {{ $role->display_name }}
                        </td>
                        <td>
                            {!! $role->description !!}
                        </td>
                        <td>
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                    <button onclick="return confirm('¿Estás Seguro?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $roles->links() }}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @else
    <p class="alert alert-warning">No hay roles creados aun. <a href="{{ route('admin.roles.create') }}">Crear uno</a></p>
    @endif
</section>
<!-- /.content -->
@endsection