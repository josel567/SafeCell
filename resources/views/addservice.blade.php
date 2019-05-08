@extends('app')

@section('title', 'Añadir servicio | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Añadir servicio</h2>
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
        <!-- ============================================================== -->
        <!-- Formulario seleccionar servicio -->
        <!-- ============================================================== -->
        <div class="row mt-5">
            <div class="col-xl-3 mx-auto">
                <div class="card">
                    <h5 class="card-header text-center">Servicios disponibles</h5>
                    <div class="card-body">
                        <form action="/adddevice"  method="POST" id="basicform" data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <select id="select_service" class="form-control">
                                    <option>Internet</option>
                                    <option disabled>Gps</option>
                                    <option hidden>Wifi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="gestionar_servicio" class="form-control">
                                    <option>Activar</option>
                                    <option>Desactivar</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col pl-0">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Guardar cambios</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end Formulario seleccionar servicio -->
        <!-- ============================================================== -->
    </div>
@endsection