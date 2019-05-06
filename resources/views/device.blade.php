@extends('app')

@push('head')
    <script src="{{ asset('js/map.js')}}"></script>
@endpush

@section('title', 'Dispositivo | SafeCell')

@section('content')
    <script>
        var appSettings = {
            deviceId :"{{$data['device']->id}}",
            accesToken : "{{$_COOKIE['acces_token']}}"
        };
    </script>
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Detalles de {{$data['device']->alias}}</h2>
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
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header text-center">Geolocalización de su dispositivo en tiempo real</h5>
                    <div class="card-body">
                        <div id="map" class="gmaps">

                        </div>
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
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header d-flex">
                        <h4 class="card-header-title d-block w-100">Último paso</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Para terminar la configuración del dispositivo descarga la aplicación en el siguiente enlace e instalala en el terminal.</p>
                        <a href="{{ asset('files/app-release-unsigned.apk') }}" class="btn btn-primary">Descargar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection