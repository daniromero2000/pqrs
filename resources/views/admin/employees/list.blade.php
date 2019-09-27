@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($employees)
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>Empleados Socomir</h1>
            <table class="table table-admin-list">
                <thead class="thead-admin-list">
                    <tr class="tr-admin-list">
                        <th class="text-center" scope="col-12">Nombre</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col">Telefono</th>
                        <th class="text-center" scope="col">Cargo</th>
                        <th class="text-center" scope="col">Sucursal</th>
                        <th class="text-center" scope="col">Estado</th>
                        <th class="text-center" scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody class="tbody-admin-list">
                    @foreach ($employees as $employee)
                    <tr>
                        <td class="text-center tr-admin-list">
                            <a href="{{ route('admin.employees.show', $employee->id) }}">{{ $employee->name }}</a>
                        </td>
                        <td class="text-center">{{ $employee->email }}</td>
                        <td class="text-center">{{ $employee->phone }}</td>
                        <td class="text-center">{{ $employee->position }}</td>
                        <td class="text-center">{{$employee->subsidiary->name }}</td>
                        <td class="text-center">
                            @include('layouts.status', ['status' => $employee->status])</td>
                        <td class="text-center">
                            <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="post"
                                class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group ">
                                    <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                        class="btn btn-primary btn-sm "><i class="fa fa-edit "></i> Editar</a>
                                    @if($user->hasPermission('delete-employee')) <button
                                        onclick="return confirm('¿Estás Seguro?')" type="submit"
                                        class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button>@endif
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection