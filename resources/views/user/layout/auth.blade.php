<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tauret Computadores</title>
    <link rel="shortcut icon" type="image/png" href="{{url('/images/icono.png')}}"/>
    <meta name="twitter:" content="@tauretunilago ">
    <meta name="facebook" content="https://www.facebook.com/Tauretcomputadores/">
    <meta name="author" content="Exala innovación Digital S.A.S">
    <meta name="keywords" content="unilago, bogota, computadores, tarjetas, video, gamer, lista, listado, precio, portatiles, razer, patriot, gigabyte, kingston, asus, samsung, lg, hp, steelseries, msi, xfx, sapphire, amd, intel, partes, computer, computadoras, logitech, thermaltake, cajas, redes, board, toshiba, discos, acer, cannon, nvidia, memorias, monitores, impresora, equipos, computo, procesadores, externos, accesorios, mouse, juegos, diablo, wow. venta, compra, evga, ups, quemador, ips, 3d, tablet, ipad, bf3, software, windows, hardware, usb, FX, intel, @yield('keywords')">
    @yield('meta')
    @include('user.includes.style')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@include('user.includes.google')
</head>
<body style="background:url('/images/fondo.jpg') no-repeat; background-size:100% auto; background-attachment:fixed;">
    <div class="top">
        <div class="container">

            <ul class="pull-right">
                <li><a href="{{url('register')}}" style="color:white"><i class="fa fa-user-plus" aria-hidden="true"></i> Regístrarse</li></a>
                <li><a href="{{url('login')}}" style="color:white"><i class="fa fa-sign-in" aria-hidden="true"></i> Inicia Sesión</li></a>
            </ul>
        </div>
    </div>
    <header>
        @include('user.includes.login')

        <div class="container">
            <div class="logo" style="width:200px !important; margin-top:60px;" onclick="window.location.href ='{{url('/')}}'" id="logo">
                {!! Html::image('/images/logoblanco.svg')!!}
            </div>
        </div>
    </header>
    <div class="wrapp-derecha">
        @yield('body')
    </div>

    <!-- Scripts -->
    @include('user.includes.script')
    {!!Html::script('/js/app.js')!!}
    @yield('js')
</body>
</html>
