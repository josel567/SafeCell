@extends('app')

@section('title', 'Usuario | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Panel de usuario</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/showUpdateUser" class="breadcrumb-link">Mi cuenta</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Panel de usuario</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- inicio panel usuario -->
    <!-- ============================================================== -->
    <div class="">
        <div class="row mt-5">
            <!-- ============================================================== -->
            <!-- Formulario modificar usuario -->
            <!-- ============================================================== -->
            <div class="col-xs-6 col-lg-4 m-auto">
                <div class="card">
                    <h5 class="card-header">Modificar usuario:</h5>
                    <div class="card-body">
                        <form class ="" action="/updateUser" method="POST" id="basicform" data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input id="name" type="text" name="name" data-parsley-trigger="change" required placeholder="{{$data['user']->name}}" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" data-parsley-trigger="change" required placeholder="{{$data['user']->email}}" autocomplete="off" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" data-parsley-trigger="change" required placeholder="Contraseña" autocomplete="off" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Repita contraseña</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" data-parsley-trigger="change" required placeholder="Repita contraseña" autocomplete="off" class="form-control"/>
                            </div>

                            <div class="row">
                                <div class="col pl-0">
                                    <p class="text-center">
                                        <input type="submit" class="btn btn-space btn-safeCell" value="Actualizar">
                                    </p>
                                </div>
                            </div>
                        </form>
                        @if(isset($success_message))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $success_message }}</strong>
                            </div>
                        @endif
                        @if(isset($error_message))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $error_message }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end Formulario modificar usuario -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- inicio eliminar usuario -->
            <!-- ============================================================== -->
            <div class="col-xs-6 col-lg-4 m-auto">
                <div class="card">
                    <h5 class="card-header">Eliminar usuario:</h5>
                    <div class="card-body">
                        <form class="" action="/deleteUser" method="POST" id="basicform" data-parsley-validate="">
                            @csrf
                            <div class="form-group">

                            </div>

                            <div class="row">
                                <div class="col pl-0">
                                    <p class="text-center">
                                        <input type="submit" class="btn btn-space btn-safeCell" value="Eliminar">
                                    </p>
                                </div>
                            </div>
                        </form>
                        @if(isset($success_message))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $success_message }}</strong>
                            </div>
                        @endif
                        @if(isset($error_message))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $error_message }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end eliminar usuario -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end panel usuario-->
    <!-- ============================================================== -->
@endsection
