<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top ">
        <a class="navbar-brand " href="/"> <img class="nav-logo" src="{{ asset('images/logo_safecell_alargado.png') }}"/></a>
        <button  id="btn-navbar" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse col-9 " id="navbarDropdownMenuLink2">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lang</a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2" style="min-width:10%">
                        <a class="dropdown-item" href="{{ url('lang', ['es']) }}"><img class="nav-logo" src="{{ asset('images/spain.png') }}" style="width:100%;height:100%"/></a>
                        <a class="dropdown-item" href="{{ url('lang', ['ca']) }}"><img class="nav-logo" src="{{ asset('images/catalan.png') }}" style="width:100%;height:100%"/></a>
                        <a class="dropdown-item" href="{{ url('lang', ['en']) }}"><img class="nav-logo" src="{{ asset('images/uk.png') }}" style="width:100%;height:100%"/></a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/assets/images/user.png" alt="" class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name"> {{$data['user']->name}} </h5>
                        </div>
                        <a class="dropdown-item" href="/showUpdateUser"><i class="fas fa-user mr-2"></i>{{ __('messages.account') }}</a>
                        <a class="dropdown-item" href="/enConstruccion"><i class="fas fa-cog mr-2"></i>{{ __('messages.conf') }}</a>
                        <a class="dropdown-item" href="/logout"><i class="fas fa-power-off mr-2"></i>{{ __('messages.logout') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->