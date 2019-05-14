@extends('app')

@section('title', 'Dispositivo | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">¿Cómo empezar?</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ayuda</li>
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
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    Primeros pasos
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>¡Bienvenido a SafeCell! Este tutorial te mostrará de manera sencilla cómo utilizar la aplicación.</p>
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
                        <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                            <img src="../assets/vendor/timeline/img/cd-icon-picture.svg" alt="Picture">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content">
                            <h3>1. Registro</h3>
                            <p>Para registrarse en nuestra aplicación sólo es necesario un nombre de usuario, tu email y una contraseña. Una vez registrado ya podemos empezar a utilizar SafeCell.</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                            <img src="../assets/vendor/timeline/img/cd-icon-movie.svg" alt="Movie">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content">
                            <h3>2. Panel de administración</h3>
                            <p>Lo primero que verás al iniciar sesión en la aplicación será tu listado de dispositivos añadidos. Como suponemos que es la primera vez que entras, no tendrás ninguno todavía. Pulsa el botón “añadir dispositivo” para añadir tantos dispositivos como desees.</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--picture js-cd-img cd-timeline__img--bounce-in">
                            <img src="../assets/vendor/timeline/img/cd-icon-picture.svg" alt="Picture">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content cd-timeline__content--bounce-in">
                            <h3>3. Añadir dispositivo</h3>
                            <p>Para añadir un dispositivo a tu cuenta, deberás rellenar el formulario con todos los campos de manera correcta.
                            <p>El alias, la marca y el modelo son campos necesarios para recordar de manera sencilla a quien pertenece este dispositivo.</p>
                            <p>El imei deberá pertenecer a ese dispositivo, es muy importante que se introduzca de manera correcta para poder gestionar todos los servicios que ofrece SafeCell.</p>
                            <p>Recuerda que para conseguir el imei de un teléfono móvil, sólo hay que marcar *#06# y seguidamente la tecla de llamada del dispositivo. El número que se muestre en pantalla y que ha de constar de 15 digitos, es el que deberás añadir en el campo imei.</p>
                            <p>Una vez añadido el dispositivo ya podemos regresar al panel de administración.</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--location js-cd-img cd-timeline__img--bounce-in">
                            <img src="../assets/vendor/timeline/img/cd-icon-location.svg" alt="Location">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content cd-timeline__content--bounce-in">
                            <h3>4. Administrar dispositivos</h3>
                            <p>Al pulsar “administrar dispositivo”, veremos un mapa que mostrará por geolocalización la posición a tiempo real de ese dispositivo y un listado con los servicios activos.</p>
                            <p>Para añadir un servicio sólo hay que pulsar “añadir servicio” y agregar los servicios que desee activar.</p>
                        </div>
                        <!-- cd-timeline__content -->
                    </div>
                    <!-- cd-timeline__block -->
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--location js-cd-img cd-timeline__img--bounce-in">
                            <img src="../assets/vendor/timeline/img/cd-icon-location.svg" alt="Location">
                        </div>
                        <!-- cd-timeline__img -->
                        <div class="cd-timeline__content js-cd-content cd-timeline__content--bounce-in">
                            <h3>5. Descargar la aplicación</h3>
                            <p>Por último deberá descargarse la aplicación móvil que le será facilitada al pulsar “Descargar”.</p>
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


