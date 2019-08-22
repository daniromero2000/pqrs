@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if(!$permissions->isEmpty())
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>Permisos Empleados</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            {{ $permission->display_name }}
                        </td>
                        <td>
                            {!! $permission->description !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $permissions->links() }}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @else
    <p class="alert alert-warning">No hay permisos creados aun. </p>
    @endif
</section>
<!-- /.content -->
@endsection