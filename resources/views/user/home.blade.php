@extends('user.layout.home')
@section('meta')
  <meta name="description" content="Buscamos que nuestros clientes vean y sientan a Emotion Fit Center como su segundo hogar. Para ello  ofrecemos precios asequibles; donde el dinero no es el factor que te impedirá alcanzar tus objetivos físicos y emocionales, donde podrás, no sólo acondicionarte físicamente, sino también cambiar tu entorno y entrar en contacto con diferente tipo de personas. Los precios varían dependiendo de la época del año y de las promociones disponibles en el momento, sin embargo todos se imponen a partir de la idea de cuidar la economía de nuestros clientes.
  ">
@endsection
@section('body')
<style>
  
  @font-face {

    font-family: 'WSansNew-Bold';
    src: url('../fonts/WSansNew-Bold.otf');

  }

  @font-face {

    font-family: 'light';
    src: url('../fonts/light.ttf');

  }

  * {

    font-family: 'WSansNew-Bold';

  }

  li a {

    color: black;

  }

  li a:hover {

    color: #fff;
    text-decoration: none;

  }

  li a:focus {

    color: #fff;
    text-decoration: none;

  }

  img {

    border-radius: 1%;
  }

  .selected {

    color: #fff;

  }

  .img-btn {

    display: block;

  }

  .img-btn:hover {

    cursor: pointer;

  }
</style>
   <section style="margin-top: 5%;">
      <nav class="navbar" style="margin: 0 auto;margin-top: 1%;width: 98%;color: #fff;">
        <ul style="display: flex;list-style-type: none;background:  grey;justify-content:  center;">
      <li style="margin: 1%;"><a href="/">INICIO</a></li>
      <li style="margin: 1%;"><a href="/spa">BIENESTAR &amp; SPA</a></li>
      <li style="margin: 1%;"><a href="/restaurant">RESTAURANTE &amp; BAR</a></li>
      <li style="margin: 1%;"><a href="/deportes">DEPORTES &amp; CURSOS</a></li>
      <li style="margin: 1%;"><a href="/eventos">CENTRO DE EVENTOS</a></li>
      <li style="margin: 1%;"><a href="/blog">BLOG</a></li>
      <li style="margin: 1%;"><a href="/contacto">CONTÁCTENOS</a></li>
      </ul>
      </nav>
    </section>
    
  <section class="container">
      <div style="width: 98%;display: flex; flex-direction: row;">
        <div style="width: 80%;">
          <img src="{{url('images/flecha-banner.png')}}" alt="flecha-banner" style="position: absolute;top: 9%;left: 5.501%;">
          <img src="{{url('images/banner-principal.jpg')}}" alt="banner-principal" style="width: 100%;
          margin: 1%;">
          <img src="{{url('images/flecha-banner.png')}}" alt="flecha-banner" style="position: absolute;top: 9%;left: 72.7%;transform:  rotate(180deg);">
        </div>
        <div style="display: flex;flex-direction: column;justify-content: space-around;margin-left:  2%;">
    <img src="{{url('images/banner-lateralderecho.jpg')}}" alt="banner-lateralderecho" style="margin: 1%;height: 45%;">
    <img src="{{url('images/banner-lateralderecho.jpg')}}" alt="banner-lateralderecho" style="margin: 1%;height: 45%;">
          </div>
        </div>
    <div style="display: flex;flex-direction: row;width: 98%;">
       <div style="width: 80%;padding: 1%;">
          <img src="{{url('images/banner-promocion-grande.jpg')}}" alt="banner-promocion-grande" style="width: 99.4%;height: 92%;">
        </div>
        <div style="width: 20%;padding: 1% 0.2%;">
          <img src="{{url('images/banner-promocion-pequeno.jpg')}}" alt="banner-promocion-pequeno" style="width: 100%;height: 91%;">
        </div>
      </div>
    </section>
   <div style="width: 100%;display: flex;justify-content:  center;margin-bottom: 2%;">
      <img src="{{url('images/flecha-verde.jpg')}}" alt="flecha-verde">
    </div>
   <section class="container" style="display: flex;flex-direction: row;">
      <div style="width: 50%; padding: 10%;">
        <h2 style="font-family:'light';">NOSOTROS</h2>
        <br>
        <p style="font-family: arial;">Aquí se coloca una descripción que se hable acerca de que es el club dhuchi, es totalmente diferente a las otras partes de la página, debe ser muy general sin especificar los servicios. Se recomienda que no sea más de 134 caracteres</p>
      </div>
      <div style="width: 50%;padding: 2%;">
        <img src="{{url('images/imagen-nosotros.png')}}" alt="imagen-nosotros" style="width: 100%;">
      </div>
    </section>
     <div style="width: 100%;display: flex;justify-content:  center;margin: 2% 0%;">
      <img src="{{url('images/flecha-verde.jpg')}}" alt="flecha-verde" style="transform: rotate(180deg);">
    </div>

   <section class="container" style="margin:  5% 2%;">
      <div>
      <h1 style="font-size: 2.8em;margin-bottom: 1%;font-family: 'WSansNew-Bold';">OFERTAS ESPECIALES</h1>
      <img src="{{url('images/decoracion.png')}}" alt="decoracion">
      </div>
    </section>
   <div style="width: 100%;">
      <nav class="navbar" style="margin: 0 auto;margin-top: 1%;width: 98%;color: #fff;margin: 5% 1%;">
        <ul style="display: flex;list-style-type: none;background:  grey;justify-content:  center;">
      <li style="margin: 1%;"><a href="#" class="selected">BIENESTAR &amp; SPA</a></li>
      <li style="margin: 1%;"><a href="#">RESTAURANTE &amp; BAR</a></li>
      <li style="margin: 1%;"><a href="#">DEPORTES &amp; CURSOS</a></li>
      <li style="margin: 1%;"><a href="#">TERAPIA BIOENERGÉTICA</a></li>
      <li style="margin: 1%;"><a href="#">FIESTAS TEMÁTICAS</a></li>
      </ul>
      </nav>
    </div>

  <section class="container" style="display: flex;flex-direction: row;">
      <div style="width: 60%;">
        <img src="{{url('images/flecha-banner.png')}}" alt="flecha-banner" style="position: absolute;top: 37%;left: 4.8%;">
        <img src="{{url('images/eventos-especiales.jpg')}}" alt="eventos-especiales" style="width: 100%;height: 70%;" class="img-btn">
      </div>
     <div style="width: 40%;">
        <div style="margin: 14% 0% 1% 64%;">
          <a href="#"><img src="{{url('images/boton-mas-ofertas.png')}}" alt="all-offers"></a>
        </div>
       <div style="position: absolute;z-index: 2;color: white;top: 36%;left: 59%;width: 31%;">
        <h2 style="font-size:  1.5em;font-family: 'light';">NOMBRE DE LA OFERTA</h2>
        <br>
        <p style="font-family: arial;">Aquí se coloca una descripción que hable acerca de que es el club dhuchi, es totalmente diferente a las oras partes de la página. Debe ser muy general, sin especificar los servicios, se recomienda que no sea más de 134 caracteres. <a href="#" style="color: #fff;">Leer más</a></p>
        <br>
        <a href="#">
          <img src="{{url('images/boton-compra-eventos-especiales.png')}}" alt="boton-compra-eventos-especiales" class="img-btn">
        </a>
        <a href="#" style="color: #7ab527;margin-left: 59%;">Términos y condiciones</a>
        </div>
      <img src="{{url('images/complemento-es.png')}}" alt="complemento" style="position:  absolute;left: 42%;margin-top: 1%;width: 56%;z-index: 1;">
       <img src="{{url('images/flecha-banner.png')}}" alt="flecha-banner" style="position: absolute;top: 37%;left: 96.4%;transform:  rotate(180deg);z-index: 2;">
    </div>

</section>

    <section class="container" style="margin: 5% 2%;">
      <div>
      <h1 style="font-size: 2.8em;margin-left: 1%;margin-bottom: 1%;">FOTOS &amp; VÍDEOS</h1>
      <img src="{{url('images/decoracion-fv.png')}}" alt="decoracion">
      </div>
    </section>
   <div style="width: 100%;">
      <nav class="navbar" style="margin: 0 auto;margin-top: 1%;width: 98%;color: #fff;margin: 5% 1%;">
        <ul style="display: flex;list-style-type: none;background:  grey;justify-content:  center;">
      <li style="margin: 1%;"><a href="#" class="selected">BIENESTAR &amp; SPA</a></li>
      <li style="margin: 1%;"><a href="#">RESTAURANTE &amp; BAR</a></li>
      <li style="margin: 1%;"><a href="#">DEPORTES &amp; CURSOS</a></li>
      <li style="margin: 1%;"><a href="#">TERAPIA BIOENERGÉTICA</a></li>
      <li style="margin: 1%;"><a href="#">FIESTAS TEMÁTICAS</a></li>
      </ul>
      </nav>
    </div>
    <br>
    <section class="container">
     <div style="display: flex;flex-direction: row;">
        <img src="{{url('images/spa1.jpg')}}" alt="spa1" style="margin: 1%;width: 46%;">
        <img src="{{url('images/spa2.jpg')}}" alt="spa2" style="margin: 1%;width: 23%;">
        <img src="{{url('images/spa2.jpg')}}" alt="spa3" style="margin: 1%;width: 23%;">
      </div>
      <div style="display: flex;flex-direction: row;">
        <img src="{{url('images/spa2.jpg')}}" alt="spa2" style="margin: 1%;">
        <img src="{{url('images/spa2.jpg')}}" alt="spa3" style="margin: 1%;">
        <img src="{{url('images/spa1.jpg')}}" alt="spa1" style="margin: 1%;width: 50%;">
      </div>
      <div></div>
    </section>
      <div class="container">
<img src="{{url('images/mas-fotos.png')}}" alt="ver-mas-fotos" style="margin-left: 1%;margin-bottom: 5%;">
    </div>
    <section class="container" style="margin:  5% 2%;">
      <div>
      <h1 style="font-size: 2.8em;margin-bottom: 1%;">EVENTOS ESPECIALES</h1>
      <img src="{{url('images/decoracion.png')}}" alt="decoracion">
      </div>
    </section>
   <div style="width: 100%;">
      <nav class="navbar" style="margin: 0 auto;margin-top: 1%;width: 98%;color: #fff;margin: 5% 1%;">
        <ul style="display: flex;list-style-type: none;background:  grey;justify-content:  center;">
      <li style="margin: 1%;"><a href="#" class="selected">MATRIMONIO</a></li>
      <li style="margin: 1%;"><a href="#">PEDIDA DE MANO</a></li>
      <li style="margin: 1%;"><a href="#">NEGOCIOS</a></li>
      <li style="margin: 1%;"><a href="#">CONVENCIONES</a></li>
      <li style="margin: 1%;"><a href="#">CUMPLEAÑOS</a></li>
      <li style="margin: 1%;"><a href="#">15 AÑOS</a></li>
      </ul>
      </nav>
    </div>
    <br>
     <section class="container" style="margin-bottom: 4%;">
       <div style="display: flex;flex-direction: row;">
          <img src="{{url('images/eventos-especiales.jpg')}}" alt="eventos-especiales" style="width: 59%;height: 70%;" class="img-btn">
          <div style="position: absolute;left: 61%;color: #fff;z-index: 10;width: 31%;margin-top: 3%;">
            <h4 style="font-size: 2.8em;">Nombre del Evento</h4>
            <br>
            <p>Aquí se coloca una descripción que hable del clud dhuchi, es diferente a las otras partes de la página, debe ser muy general sin especificar los servicios. Se recomineda que no sea más de 134 caracteres</p>
            <ul style="color: #fff;">
              <li>descripción</li>
              <li>descripción</li>
              <li>descripción</li>
            </ul>
          </div>
          <img src="{{url('images/complemento-banner.png')}}" alt="complemento-banner" style="width: 91%;position:  absolute;">
         <div>
         <img src="{{url('images/llamar-cotizar.png')}}" alt="llama-cotiza" style="position:  absolute;top: 76.7%;left: 46%;" class="img-btn">  
          </div>
       </div>
     </section>
    <section class="container" style="margin:  5% 5%;">
      <div>
      <h1 style="font-size: 2.8em;margin-bottom: 1%;margin-left: 1%;">ALIADOS</h1>
      <img src="{{url('images/decoracion-aliados.png')}}" alt="decoracion">
      </div>
    </section>

  <section class="container" style="display:  flex;justify-content:  space-between;margin: 2% 0%;width: 100%;">
      <img src="{{url('images/flecha-aliados.png')}}" alt="flecha-izquierda" style="margin-right: 4%;">
      <img src="{{url('images/logo-aliados.png')}}" alt="logo-aliados" style="margin: 0% 4%;">
      <img src="{{url('images/logo-aliados.png')}}" alt="logo-aliados" style="margin: 0% 4%;">
      <img src="{{url('images/logo-aliados.png')}}" alt="logo-aliados" style="margin: 0% 4%;">
  <img src="{{url('images/flecha-aliados.png')}}" alt="flecha-derecha" style="transform: rotate(180deg);margin-left:  4%;">
    </section>

 <section class="container" style="margin: 6% 2% 0% 2%;">
      <div>
      <h1 style="font-size: 2.8em;margin-bottom: 1%;margin-left: 1.5%;">EXPLORE BOGOTÁ</h1>
      <img src="{{url('images/decoracion-bogota.png')}}" alt="decoracion">
      </div>
      <br>
      <div class="container" style="margin: 1% 6%;">
        <div style="position:  absolute;top: 93%;left: 13%;color:  #fff;font-family: 'light';">
          <h4>Nuestra Localización</h4>
          <br>
          <p style="font-family: 'light';">Descripción</p>
          <br>
          <a href="#" style="color: #7ab527;font-family: 'light';">Cómo llegar</a>
        </div>
        <img src="{{url('images/recuadro-bogota.jpg')}}" alt="recuadro-bogota">
        <img src="{{url('images/mapa.jpg')}}" alt="mapa-bogota">
      </div>
    </section>
    <br>

    @endsection
