@extends('app')

@section('title', 'Dashboard | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Bienvenido {{$data['user']->name}}</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Administración de dispositivos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div class="ecommerce-widget">
        @if($data['devices'] == 0)
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Aún no tienes dispositivos creados.</h2>
                </div>
            </div>
        @else
            <div class="row">
                @foreach ($data['devices'] as $device)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <i class="fas fa-times delete-icon"></i>
                                <h5 class="text-muted"> {{$device['alias']}}</h5>
                                <div class="metric-value d-block">
                                    <h2 class="mb-1">{{$device['brand']}}</h2>
                                </div>
                                <div class="metric-value d-block">
                                    <h4 class="mb-1">{{$device['model']}}</h4>
                                </div>
                                <div class="metric-value d-block">
                                    <p class="mb-1">Imei: {{$device['imei']}}</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary btn-block ">Administrar</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-12 text-center mt-4">
                <a href="/adddevice" class="btn btn-secondary">Añadir dispositivo</a>
            </div>
        </div>
    </div>
@endsection