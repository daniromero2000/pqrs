@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->

    <div class="box">
        <div class="box-body">
            <h1>Productos en Venta</h1>
            <div class="row">
                <div class="col-md-6">
                    @include('layouts.search', ['route' => route('admin.finances.index')])
                </div>
            </div>
            @if(!$products->isEmpty())
            @include('admin.shared.finances') {{ $finances->links()
            }}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endif

</section>
<!-- /.content -->
@endsection