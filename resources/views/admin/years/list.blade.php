@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($years)
    <div class="box">
        <div class="box-body">
            <h1>Años Financieros</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($years as $year)
                    <tr>
                        <td>
                            <a href="{{ route('admin.years.show', $year->id) }}">{{ $year->year }}</a></td>
                        <td>
                            <form action="{{ route('admin.years.destroy', $year->id) }}" method="post"
                                class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ route('admin.years.edit', $year->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                    <button onclick="return confirm('¿Estás Seguro?')" type="submit"
                                        class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Borrar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $years->links() }}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection