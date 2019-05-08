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
                        <form action="/addService"  method="POST" id="basicform" data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <select id="select_service" class="form-control" name="service_name">
                                    <option value="internet">Internet</option>
                                    <option value="gps" disabled>Gps</option>
                                    <option hidden>Wifi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="gestionar_servicio" class="form-control" name="is_active">
                                    <option value="true">Activar</option>
                                    <option value="false">Desactivar</option>
                                </select>
                                <input type="text" name="device_id" value="{{$data['device_id']}}" hidden>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-center">
                                        <button type="submit" class="btn btn-space btn-primary mb-3 mt-2">Guardar cambios</button>
                                    </p>
                                </div>
                            </div>
                        </form>

                        @if(isset($data['response']->message))
                            @if($data['response']->message == "Ese servicio ya está asociado al dispositivo.")
                                <div class="alert alert-danger alert-block">
                            @else
                                <div class="alert alert-success alert-block">
                            @endif
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $data['response']->message }}</strong>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end Formulario seleccionar servicio -->
        <!-- ============================================================== -->
    </div>
@endsection