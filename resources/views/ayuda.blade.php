@extends('app')

@section('title', 'Dispositivo | SafeCell')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Cómo empezar?</h2>
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
    <!-- end ayuda -->
    <!-- ============================================================== -->
    <div class="">
        <div class="">
            <div class="stackedit__html"><h2 id="cómo-empezar-a-utilizar-safecell">CÓMO EMPEZAR A UTILIZAR SAFECELL</h2>
                <p>Bienvenido a SafeCell! Este tutorial te mostrará de manera sencilla cómo utilizar esta aplicación.</p>
                <h3 id="registro">Registro</h3>
                <p>Para registrarse en nuestra aplicación sólo es necesario un nombre de usuario, tu email y una contraseña.<br>
                    Una vez registrado ya podemos empezar a utilizar SafeCell.</p>
                <h3 id="panel-de-administración">Panel de administración</h3>
                <p>Lo primero que verás al entrar en la aplicación será tu listado de dispositivos añadidos. Como suponemos que es la primera vez que entras, no tendrás ninguno todavia.<br>
                    Pulsa el botón “añadir dispositivo” para cada telefono que quieras añadir.</p>
                <h3 id="añadir-dispositivo">Añadir dispositivo</h3>
                <p>Para añadir un dispositivo a tu cuenta, deberás rellenar el formulario con todos los campos de manera correcta.<br>
                    El alias, la marca y el modelo son campos necesarios para recordar de manera sencilla a quien pertenece este dispositivo.<br>
                    El imei deberá pertenecer a ese dispositivo, es muy importante que se introduzca de manera correcta.<br>
                    Recuerda que para conseguir el imei de un teléfono móvil, sólo hay que marcar *#06# y seguidamente la tecla de llamada del dispositivo. El número que se muestre en pantalla y que ha de constar de 15 digitos, es el que deberás añadir en el campo imei.<br>
                    Una vez añadido el dispositivo ya podemos regresar al panel de administración.</p>
                <h3 id="administrar-dispositivos">Administrar dispositivos</h3>
                <p>Al pulsar “administrar dispositivo”, veremos un mapa que mostrará por geolocalización la posicion a tiempo real de ese dispositivo y un listado con los servicios activos.</p>
                <p>Para añadir un servicio sólo hay que pulsar “añadir servicio” y agregar los servicios que desee activar.</p>
                <h2 id="ultimo-paso">Ultimo paso</h2>
                <p>Por último deberá descargarse la aplicación móvil que le será facilitada al pulsar “Descargar”.<br>
                    Esto para joan</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end ayuda-->
        <!-- ============================================================== -->
    </div>
@endsection


