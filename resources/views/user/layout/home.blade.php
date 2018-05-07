<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Club Dhuchi</title>
    <link rel="shortcut icon" type="image/png" href="{{url('/images/icono.png')}}"/>
    <meta name="description" content="Emotion Fit Center es la mejor opción cuando de entrenamiento se trata. Contamos con el mejor equipo de médicos deportologos, nutricionista, entrenadores, excelentes instalaciones y equipos deportivos, 32 clases grupales, zonas de cardio, fuerza y pesas, turco, y zona de parqueo gratis.  Aparte el precio no es un excusa, te ofrecemos las tarifas más cómodas sin membresía.">

  <meta name="keywords" content="Gimnasio, gym colina,  colina campestre, gimnasio en iberia, gimnasio en suba, gimnasio en niza, ejercicio, entrenamiento, turco, centro de entrenamiento deportivo, equipos deportivos, gimnasio barato económico, entrenador, entrenamiento personalizado, entrenamiento funcional, trx, crossfit.">
    <meta name="facebook" content="https://www.facebook.com/Tauretcomputadores/">
    <meta name="author" content="Exala innovación Digital S.A.S">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="keywords" content="emotion, gym, buena forma, gimnacio, @yield('keywords')">
    <script defer src="https://use.fontawesome.com/releases/v5.0.12/js/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>
    @yield('meta')
    @include('user.includes.style')
    @include('user.includes.google')
    <style media="screen">
        .pac-container {
            z-index: 9999;
        }
    </style>
</head>
<body style="position:relative; background: #fff;
@if(isset($wpaper->tipo_archivo) && $wpaper->tipo_archivo == 'imagen')
background:url('{{url('images/wallpapers/'.$wpaper->link_imagen)}}') no-repeat; background-size: 100%;
    background-attachment: fixed;
@endif

@if(isset($wpaper->tipo_archivo) && $wpaper->tipo_archivo == 'video')
background-color: black;
@endif
">

@include('alerts.messages')
@if(isset($wpaper->tipo_archivo) && $wpaper->tipo_archivo == 'video')
<video id="video" autoplay preload="auto" loop muted="muted">
    <source src="{{url('videos/'.$wpaper->link_imagen.'.webm')}}" type="video/webm"/>
        <source src="{{url('videos/'.$wpaper->link_imagen.'.mp4')}}" type="video/mp4"/>
            <source src="{{url('videos/'.$wpaper->link_imagen.'.ogg')}}" type="video/ogg"/>
            </video>
            @endif
            @if(isset($wpaper->tipo_archivo) && $wpaper->tipo_archivo == 'video')
                <div class="negro">

                </div>
                @endif

             <div class="top" style="background: black;padding-top:  1%;">
                <div class="container">
                <a href="#" style="color: #fff; margin-left: 1%;"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="#" style="color: #fff;margin-left: 1%;"><i class="fab fa-facebook-square fa-2x"></i></a>
                </div>
                </div>
       <div style="background: black;padding-bottom: 1%;padding-top: 5%;">
          <div class="container">
            <div style="color: #fff;">
              <i class="fas fa-phone"></i>
              <span><span style="color: #24DA30FF;">(+57)</span> 312 213 4567</span>
            </div>
            <div style="color: #fff;">
              <i class="fas fa-envelope"></i>
              <span>info@<span style="color: #24DA30FF;">clubeventosdhuchi.com</span></span>
            </div>
            </div>
   <div class="container" style="display:  flex;justify-content:  center;position:  absolute;top: 0.4%;width: 100%;">
            <img src="http://127.0.0.1:8000/images/logo.png" alt="logo" style="width: 20%;">
          </div>
<div class="container" style="display:  flex;justify-content:  flex-end;width: 100%;position:  absolute;top: 0.6%;">
            <img src="http://127.0.0.1:8000/images/boton-compras.png" alt="logo-shop" style="width: 20%;">
          </div>
        </div>
        
@include('vendor.toast.messages-jquery')
@yield('body')


            <!--vista rapida-->
            <!-- Modal: QUick look -->
            <div class="modal fade" id="quick-look" role="dialog"></div>
            <!--/.Modal: QUick look -->
            @include('user.includes.cart')





            <div class="btn-float">
              <button type="button" class="mifloat btn btn-warning btn-lg" name="button" data-toggle="modal" data-target="#myModal3"> Inscribete ya¡ </button>
            </div>

      <footer class="mifoot" style="background-image: url('http://127.0.0.1:8000/images/black-bar.jpg');background-position: 33%;background-repeat: no-repeat;height: 22em;">
                <div class="" style="width: 100%;padding-top: 2%;background: black;height: 20.7em;">
                   <div class="col-md-8 text-center" style="width: 30%;">
                            <div>
                            <img src="http://127.0.0.1:8000/images/contacto-footer.png" alt="contacto-footer">
                            </div>
                            <br>
                          <ul style="list-style-type: none;padding: 0;">
                              <li>
                        <img src="http://127.0.0.1:8000/images/telefono.png" alt="telefono-icon" style="margin-right: 1%;">
                                  <span>Teléfono</span>
                              </li>
                              <li style="margin-left: 12%;">
                        <img src="http://127.0.0.1:8000/images/celular.png" alt="celular-icon" style="margin-right: 1%;">
                                  <span>Teléfono Móvil</span>
                              </li>
                              <li style="margin-left: 22%;">
                        <img src="http://127.0.0.1:8000/images/email.png" alt="mail-icon" style="margin-right: 1%;">
                                  <span>Correo Electrónico</span>
                              </li>
                              <li style="margin-left: 2%;">
                        <img src="http://127.0.0.1:8000/images/ubicacion.png" alt="location-icon" style="margin-right: 1%;">
                                  <span>Dirección</span>
                              </li>
                              <li>
                                  <span>Bogotá, Colombia</span>
                              </li>
                          </ul>
                         </div>

                         <div class="col-md-4" style="margin: 6% 2%;">
                             <img src="http://127.0.0.1:8000/images/logo-final-home.png" alt="logo-footer">
                         </div>

                        <div class="col-md-4 text-left" style="width: 20%;">
                            <img src="http://127.0.0.1:8000/images/noticias-final-home.png" alt="noticias-final-home" style="margin-left: 27%;margin-bottom:  8%;">
                            <br>
                            <img src="http://127.0.0.1:8000/images/publicidad.jpg" alt="publicidad">
                         
                        </div>



                </div>


            </footer>

            @include('user.includes.script')
            {!!Html::script('js/frontend.js')!!}
            <script type="text/javascript">
                if ($('.view-link').length > 0) {
                    $('.view-link').click(function(){
                        $.ajax({
                            url: $(this).attr('href')
                        })
                        .done(function(html_form) {
                            $('#quick-look').html(html_form);
                            $('#quick-look').modal('show');
                        })
                        .fail(function() {
                            console.log("error");
                        });
                        return false;
                    });
                }

                var config = {
                    apiKey: "AIzaSyAmjPbTrTc_ghBV4BZqn0jKGRi_oVDIHJI",
                    authDomain: "tauret-computadores.firebaseapp.com",
                    databaseURL: "https://tauret-computadores.firebaseio.com",
                    projectId: "tauret-computadores",
                    storageBucket: "tauret-computadores.appspot.com",
                    messagingSenderId: "172872949320"
                };
                firebase.initializeApp(config);

                const messaging = firebase.messaging();
                messaging.requestPermission()
                .then(function() {
                    return messaging.getToken();
                })
                .then(function(token) {
                    $.ajax({
                        url: '{{url("api/push_post")}}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: '{{csrf_token()}}',
                            token: token,
                            user_type: 'user'
                        },
                    });
                })
                .catch(function(err) {
                    console.log(err.message);
                });

                messaging.onMessage(function(payload) {
                    Push.create(payload.notification.title, {
                        body: payload.notification.body,
                        icon: "{{url('images/icono.png')}}",
                        timeout: 6000,
                        onClick: function () {
                            window.focus();
                            this.close();
                            window.location.href=payload.notification.click_action;
                        }
                    });
                });
            </script>
            @yield('js')
            @yield('add_js')
        </body>
        </html>
