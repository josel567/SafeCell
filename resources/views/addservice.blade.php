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
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <h5 class="card-header text-center">Servicios disponibles</h5>
                    <div class="card-body">
                        <form action="/addService"  method="POST" id="basicform" data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <select id="select_service" class="form-control" name="service_name">
                                    <option value="" selected disabled> Selecciona un servicio</option>
                                    <option value="internet">Internet</option>
                                    <option value="gps">Gps</option>
                                    <option hidden>Wifi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="gestionar_servicio" class="form-control" name="is_active">
                                    <option value="" selected disabled> Selecciona un valor por defecto</option>
                                    <option value="true">Activar</option>
                                    <option value="false">Desactivar</option>
                                </select>
                                <input type="text" name="device_id" value="{{$data['device_id']}}" hidden>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-center mt-2">
                                        <button type="submit" class="btn btn-space btn-safeCell">Guardar cambios</button>
                                        <a href="/device/{{$data['device_id']}}" class="btn btn-space btn-safeCell">Cancelar</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                        @if(isset($data['message']))
                            @if($data['message'] == 'Servicio añadido correctamente.')
                                <div class="alert alert-success alert-block mt-2">
                            @else
                                <div class="alert alert-danger alert-block mt-2">
                            @endif
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $data['message'] }}</strong>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end Formulario seleccionar servicio -->
            <!-- ============================================================== -->
        </div>
@endsection