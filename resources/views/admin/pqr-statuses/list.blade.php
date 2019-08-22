@extends('layouts.admin.app') 
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($pqrStatuses)
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>Estados PQRS</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Estado</th>
                        <th scope="col">Color</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pqrStatuses as $status)
                    <tr>
                        <td>{{ $status->name }}</td>
                        <td><button class="btn" style="background-color: {{ $status->color }}"><i class="fa fa-check" style="color: #ffffff"></i></button></td>
                        <td>
                            @if($user->hasRole('superadmin|marketing'))
                            <a href="{{ route('admin.pqr-statuses.edit', $status->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>                            @endif </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection