@extends('app')

@section('title', 'Ayuda | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{ __('messages.begin') }}</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ __('messages.inicio') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('messages.help') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- inicio ayuda -->
    <!-- ============================================================== -->
    <div class="">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">{{ __('messages.steps') }}</div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ __('messages.welcome.safe') }}</p>
                        <footer class="blockquote-footer">SafeCell
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="">
            <section class="cd-timeline js-cd-timeline">
                <div class="cd-timeline__container">
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--picture js-cd-img cd-timeline__img--bounce-in" style="background: #4c275d;">
                            <img src="../assets/vendor/timeline/img/clipboard.svg" alt="Picture" style="width: 40px; height: 40px; margin-left: -17px; margin-top: -20px;">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content cd-timeline__content--bounce-in">
                            <h3>1. {{ __('messages.register') }}</h3>
                            <p>{{ __('messages.register.1') }}</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--movie js-cd-img cd-timeline__img--bounce-in" style="background: #4c275d;">
                            <img src="../assets/vendor/timeline/img/dashboard.svg" alt="Movie" style="width: 35px; height: 35px; margin-left: -17px; margin-top: -17px;">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content cd-timeline__content--bounce-in">
                            <h3>2. {{ __('messages.adm.panel') }}</h3>
                            <p>{{ __('messages.adm.panel.1') }}</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--picture js-cd-img cd-timeline__img--bounce-in" style="background: #4c275d;">
                            <img src="../assets/vendor/timeline/img/mobile-phone.svg" alt="Picture" style="width: 50px; height: 45px; margin-left: -25px; margin-top: -24px;">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content cd-timeline__content--bounce-in">
                            <h3>3. {{ __('messages.add.disp') }}</h3>
                            <p>{{ __('messages.add.disp.1') }}</p>
                            <p>{{ __('messages.add.disp.2') }}</p>
                            <p>{{ __('messages.add.disp.3') }}</p>
                            <p>{{ __('messages.add.disp.4') }}</p>
                            <p>{{ __('messages.add.disp.5') }}</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--location js-cd-img cd-timeline__img--bounce-in" style="background: #4c275d;">
                            <img src="../assets/vendor/timeline/img/process_1.svg" alt="Location" style="width: 50px; height: 45px; margin-left: -25px; margin-top: -23px;">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content cd-timeline__content--bounce-in">
                            <h3>4. {{ __('messages.admin.disp') }}</h3>
                            <p>{{ __('messages.admin.disp.1') }}</p>
                            <p>{{ __('messages.admin.disp.2') }}</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--location js-cd-img cd-timeline__img--bounce-in" style="background: #4c275d;">
                            <img src="../assets/vendor/timeline/img/download.svg" alt="Location" style="width: 40px; height: 35px; margin-left: -20px; margin-top: -20px;">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content cd-timeline__content--bounce-in">
                            <h3>5. {{ __('messages.downApp') }}</h3>
                            <p>{{ __('messages.downApp.1') }}</p>
                            <p>{{ __('messages.downApp.2') }}</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                </div>
            </section>
        </div>
        <!-- ============================================================== -->
        <!-- end ayuda-->
        <!-- ============================================================== -->
    </div>
@endsection


