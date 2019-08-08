@extends('layouts.admin.app')
@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->

    <div class="box">
        <div class="box-body">
            <h1>Estados Financieros</h1>
            
            @if(!$finances->isEmpty())
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