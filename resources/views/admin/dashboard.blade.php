@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-header with-border">
<<<<<<< HEAD
            <h1 class="box-title"><strong>Panel Administrativo Socomir</strong></h1>
=======
            <h1 class="box-title"><strong>Panel Administrativo Model</strong></h1>
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus">
                        <!-- --></i><!-- --></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fa fa-times">
                        <!-- --></i><!-- --></button>
            </div>
        </div>
<<<<<<< HEAD
        <div class="box-body">
            <p>¡Hola <strong>{{ $user->name }}</strong>! <br>Bienvenido al Panel Administrativo</p>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 d-flex align-items-center d-flex justify-content-center">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h5 class="m-b-20"><strong>PQRS</strong></h5>
                                <h2 class="text-right"><i
                                        class="fa fa-users f-left"></i><span>{{ $pqrGlobalCount }}</span></h2>
                                <a href="{{ route('admin.pqrs.index') }}"><span
                                        class="label label-default pull-right">Ver más</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <section>
        <div class="row">
            <div class="col-md-12">
                <h1 class=""><strong>CRM PQRS Socomir</strong>
                </h1>
            </div>
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h2>{{ ($listLeadCount) }}</h2>
                        <p class="m-b-20"><strong>PQRS ABIERTOS</strong></p>
                    </div>
                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ver más</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body bg-black-gradient" style="display: none;">
                            @if(!$pqrLeads->isEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Pqrs</th>
                                        <th scope="col">Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pqrLeads as $pqrLead)
                                    <tr>
                                        <td>{{ date('M d, Y h:i a', strtotime($pqrLead->created_at)) }}</td>
                                        <td>{{ $pqrLead->id }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.pqrs.show', $pqrLead->id) }}">{{ $pqrLead->pqr }}</a>
                                        </td>
                                        <td>{{ $pqrLead->phone }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h2>{{ ($listTramiteCount) }}</h2>
                        <p class="m-b-20"><strong>PQRS EN TRÁMITE</strong></p>
                    </div>
                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ver más</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body bg-black-gradient" style="display: none;">
                            @if(!$pqrTramites->isEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Pqrs</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pqrTramites as $pqrTramite)
                                    <tr>
                                        <td>{{ $pqrTramite->id }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.pqrs.show', $pqrTramite->id) }}">{{ $pqrTramite->pqr }}</a>
                                        </td>
                                        <td>{{ $pqrTramite->name }}</td>
                                        <td>{{ $pqrTramite->phone }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-gray">
                    <div class="inner">
                        <h2>{{ ($listTramitePendienteInfo) }}</h2>
                        <p class="m-b-20"><strong>EN TRÁMITE PENDIENTE INFORMACIÓN TERCERO</strong></p>
                    </div>
                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ver más</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body bg-black-gradient" style="display: none;">
                            @if(!$pqrTramitePendienteInfos->isEmpty())
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Pqrs</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pqrTramitePendienteInfos as $pqrTramitePendienteInfo)
                                        <tr>
                                            <td>{{ $pqrTramitePendienteInfo->id }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.pqrs.show', $pqrTramitePendienteInfo->id) }}">{{ $pqrTramitePendienteInfo->pqr }}</a>
                                            </td>
                                            <td>{{ $pqrTramitePendienteInfo->name }}</td>
                                            <td>{{ $pqrTramitePendienteInfo->phone }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h2>{{ ($listAtendidoCount) }}</h2>
                        <p class="m-b-20"><strong>PQRS ATENDIDOS</strong></p>
                    </div>
                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ver más</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body bg-black-gradient" style="display: none;">
                            @if(!$pqrAtendidos->isEmpty())
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Pqrs</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pqrAtendidos as $pqrAtendido)
                                        <tr>
                                            <td>{{ $pqrAtendido->id }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.pqrs.show', $pqrAtendido->id) }}">{{ $pqrAtendido->pqr }}</a>
                                            </td>
                                            <td>{{ $pqrAtendido->name }}</td>
                                            <td>{{ $pqrAtendido->phone }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
=======
    </div>
</section>
<section class="content">
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
</section>
<!-- /.content -->
@endsection