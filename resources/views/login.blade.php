<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesión | SafeCell</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
            <div class="content">
                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <!-- Tabs Titles -->

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <img src="{{ asset('images/logo.png') }}" id="icon" alt="User Icon" />
                        </div>

                        <!-- Login Form -->
                        <form>
                            <input type="text" id="login" class="fadeIn second" name="login" placeholder="Email">
                            <input type="text" id="password" class="fadeIn third" name="login" placeholder="Contraseña">
                            <input type="submit" class="fadeIn fourth" value="Iniciar sesión">
                        </form>

                        <!-- Remind Passowrd -->
                        <div id="formFooter">
                            <a class="underlineHover" href="#">¿No tienes cuenta? Crear una ahora.</a>
                        </div>

                    </div>
                </div>
            </div>
    </body>
</html>
