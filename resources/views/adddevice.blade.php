@extends('app')

@section('title', 'Dashboard | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Añadir dispositivo</h2>
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
    <div class="">
        <div class="row mt-5">
            <!-- ============================================================== -->
            <!-- Formulario añadir dispositivo -->
            <!-- ============================================================== -->
            <div class="col-xs-12 col-lg-4 m-auto">
                <div class="card">
                    <h5 class="card-header">Datos del dispositivo:</h5>
                    <div class="card-body">
                        <form action="/adddevice"  method="POST" id="basicform" data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <label for="inputUserName">Alias</label>
                                <input id="inputUserName" type="text" name="alias" data-parsley-trigger="change" required placeholder="Ej. Móvil de Marta" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Imei</label>
                                <input minlength="15" maxlength="15" id="inputUserName" type="text" name="imei" data-parsley-trigger="change" required data-toggle="tooltip" data-html="true"  title="Para conseguir el imei de un teléfono móvil pulse *#06# y la tecla de llamada.<br>El imei ha de tener 15 digitos y es único." data-placement="right" required placeholder="Ej. 123456789157894" autocomplete="off" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Marca</label>
                                <input id="inputUserName" type="text" name="brand" data-parsley-trigger="change" required placeholder="Ej. Samsung, Xiaomi..." autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Modelo</label>
                                <input id="inputUserName" type="text" name="model" data-parsley-trigger="change" required placeholder="Ej. Galaxy S10, Mi 9..." autocomplete="off" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col pl-0">
                                    <p class="text-center">
                                        <button type="submit" class="btn btn-space btn-safeCell">Añadir dispositivo</button>
                                        <a href="/dashboard" class="btn btn-space btn-safeCell">Regresar</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                        @if (isset($error_message))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $error_message }}</strong>
                            </div>
                        @endif
                        @if (isset($success_message))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $success_message }}</strong>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end Formulario añadir dispositivo -->
            <!-- ============================================================== -->
        </div>
    </div>
@endsection