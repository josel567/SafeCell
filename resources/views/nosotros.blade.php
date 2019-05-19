@extends('app')

@section('title', 'Sobre nosotros | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{ __('messages.nosotros') }}</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ __('messages.inicio') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('messages.nosotros') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end ayuda -->
    <!-- ============================================================== -->
    <div class="">
        <div class="d-flex align-items-center h-100">
            <div class="align-self-center col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="card ">
                    <div class="card-header">{{ __('messages.proyecto') }}</div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <dl>
                                <dt>{{ __('messages.alumnos') }}</dt>
                                <dd class="ml-5">Iris Iglesias Baladon,</dd>
                                <dd class="ml-5 ">Joan Samsó Roig,</dd>
                                <dd class="ml-5">Jose Luís García Torrecillas</dd>
                            </dl>
                        </blockquote>
                        <footer class="blockquote-footer">{{ __('messages.fecha') }}</footer>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end ayuda-->
        <!-- ============================================================== -->
    </div>
@endsection