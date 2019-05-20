@extends('app')

@section('title', 'En construcción | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{ __('messages.construccion') }}</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ __('messages.inicio') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('messages.construccion') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <!-- ============================================================== -->
        <!-- inicio construccion -->
        <!-- ============================================================== -->
        <div class="d-flex align-items-center h-100">
            <div class="align-self-center col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="card ">
                    <div class="card-header">{{ __('messages.proximamente') }}</div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ __('messages.section') }}</p>
                            <footer class="blockquote-footer">{{ __('messages.working') }}</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end construccion-->
        <!-- ============================================================== -->
    </div>
@endsection
