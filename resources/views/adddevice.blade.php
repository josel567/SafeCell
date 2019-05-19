@extends('app')

@section('title', 'Añadir dispositivo | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{ __('messages.add.dev') }}</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ __('messages.inicio') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('messages.admin') }}</li>
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
        <!-- ============================================================== -->
        <!-- Formulario añadir dispositivo -->
        <!-- ============================================================== -->
        <div class="row mt-5">
            <div class="col-xs-12 col-lg-4 m-auto">
                <div class="card">
                    <h5 class="card-header">{{ __('messages.data') }}</h5>
                    <div class="card-body">
                        <form action="/adddevice"  method="POST" id="basicform" data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <label for="inputUserName">{{ __('messages.alias') }}</label>
                                <input id="inputUserName" type="text" name="alias" data-parsley-trigger="change" required placeholder="Ej. Móvil de Marta" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">{{ __('messages.imei') }}</label>
                                <input minlength="15" maxlength="15" id="inputUserName" type="text" name="imei" data-parsley-trigger="change" required data-toggle="tooltip" data-html="true"  title="{{ __('messages.inf.imei.1') }}<br>{{ __('messages.inf.imei.2') }}" data-placement="right" required placeholder="Ej. 123456789157894" autocomplete="off" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">{{ __('messages.marca') }}</label>
                                <input id="inputUserName" type="text" name="brand" data-parsley-trigger="change" required placeholder="Ej. Samsung, Xiaomi..." autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">{{ __('messages.model') }}</label>
                                <input id="inputUserName" type="text" name="model" data-parsley-trigger="change" required placeholder="Ej. Galaxy S10, Mi 9..." autocomplete="off" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col pl-0">
                                    <p class="text-center">
                                        <button type="submit" class="btn btn-space btn-safeCell">{{ __('messages.add.dev') }}</button>
                                        <a href="/dashboard" class="btn btn-space btn-safeCell">{{ __('messages.back') }}</a>
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
        </div>
        <!-- ============================================================== -->
        <!-- end Formulario añadir dispositivo -->
        <!-- ============================================================== -->
    </div>
@endsection