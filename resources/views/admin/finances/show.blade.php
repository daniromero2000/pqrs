@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($finance)
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $finance->name }}</td>
                        <td>{{ $finance->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row top-buffer bottom-buffer">
            <div class="col-md-12">
                <object data="{{asset("storage/$finance->cover")}}" type="application/pdf" width="100%" height="800px">
                    <p>It appears you don't have a PDF plugin for this browser.
                        No biggie... you can <a href="resume.pdf">click here to
                            download the PDF file.</a></p>
                </object>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.finances.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection