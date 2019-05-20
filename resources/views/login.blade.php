<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesión | SafeCell</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
            <div class="content">

                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <!-- Tabs Titles -->

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <img src="{{ asset('images/logo_safecell.png') }}" id="icon" alt="User Icon" />
                        </div>

                        <!-- Login Form -->
                        <form action="/login" method="post">
                            @csrf
                            <input type="text" id="email" class="fadeIn second" name="email" placeholder="{{ __('messages.email') }}">
                            <input type="password" id="password" class="fadeIn third" name="password" placeholder="{{ __('messages.pass') }}">
                            <input type="submit" class="fadeIn fourth" value="{{ __('messages.login') }}">
                        </form>

                        <!-- Remind Passowrd -->
                        <div id="formFooter">
                            <a class="underlineHover" href="/register">{{ __('messages.sin.cuenta') }}</a>
                        </div>


                        @if (isset($info_message))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $info_message }}</strong>
                            </div>
                        @endif
                        @if (isset($success_message))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $success_message }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle dropdown-banderas" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lang</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu"  style="background-image: url('images/background.jpg'); min-width:10%">
                            <a class=" btn" href="{{ url('lang', ['es']) }}" ><img class="nav-logo" src="{{ asset('images/spain.png') }}" style="width:100%;height:100%"/></a>
                            <a class="btn" href="{{ url('lang', ['ca']) }}"><img class="nav-logo" src="{{ asset('images/catalan.png') }}" style="width:100%;height:100%"/></a>
                            <a class="btn" href="{{ url('lang', ['en']) }}"><img class="nav-logo" src="{{ asset('images/uk.png') }}" style="width:100%;height:100%"/></a>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
