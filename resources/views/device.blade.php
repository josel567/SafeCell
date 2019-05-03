@extends('app')

@section('title', 'Dispositivo | SafeCell')

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
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic map -->
            <!-- ============================================================== -->
            <div class="col-xl-6">
                <div class="card">
                    <h5 class="card-header text-center">Geolocalización de su dispositivo en tiempo real</h5>
                    <div class="card-body">
                        <div id="map" class="gmaps"></div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic map -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <!-- ============================================================== -->
                <!-- map events -->
                <!-- ============================================================== -->
                <div class="card">
                    <h5 class="card-header text-center">Servicios activos</h5>
                    <div class="card-body">
                        <div id="" class="gmaps"></div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end map events -->
                <!-- ============================================================== -->
            </div>
        </div>

    </div>
@endsection