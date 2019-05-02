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
    <div class="ecommerce-widget">
        <div class="row mt-5">
            <!-- ============================================================== -->
            <!-- Formulario añadir dispositivo -->
            <!-- ============================================================== -->
            <div class="col-xl-3 mx-auto">
                <div class="card">
                    <h5 class="card-header">Datos del dispositivo:</h5>
                    <div class="card-body">
                        <form action="/adddevice"  method="POST" id="basicform" data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <label for="inputUserName">Alias</label>
                                <input id="inputUserName" type="text" name="alias" data-parsley-trigger="change" required placeholder="Introduzca un alias para su dispositivo" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Imei (opcional)</label>
                                <input id="inputUserName" type="text" name="imei" data-parsley-trigger="change" placeholder="Introduzca el imei de su dispositivo" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Marca</label>
                                <input id="inputUserName" type="text" name="brand" data-parsley-trigger="change" required placeholder="Introduzca la marca de su dispositivo" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Modelo</label>
                                <input id="inputUserName" type="text" name="model" data-parsley-trigger="change" required placeholder="Introduzca el modelo de su dispositivo" autocomplete="off" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col pl-0">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Añadir dispositivo</button>
                                        <a href="/dashboard" class="btn btn-space btn-secondary">Cancelar</a>
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