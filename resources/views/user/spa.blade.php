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

  .img-container {

    display: flex;
    justify-content: center;
    width: 21%;
    margin: 2%;
    transition: all 1s;

}

  .img-container:hover {

	filter: blur(2px) grayscale(30%);

  }

.img-container:before {

   transition: all 2s;
   z-index: 10;

}

.img-container:hover:before {

	width: 20%;
    position: absolute;
    height: 23em;
    display: flex;
    justify-content: center;

}

  .img-spa {

    width: 100%;

}

</style>
   <section style="margin-top: 5%;">
      <nav class="navbar" style="margin: 0 auto;margin-top: 1%;width: 98%;color: #fff;">
        <ul style="display: flex;list-style-type: none;background:  grey;justify-content:  center;">
      <li style="margin: 1%;"><a href="/">INICIO</a></li>
      <li style="margin: 1%;"><a href="/spa" class="selected">BIENESTAR &amp; SPA</a></li>
      <li style="margin: 1%;"><a href="/restaurant">RESTAURANTE &amp; BAR</a></li>
      <li style="margin: 1%;"><a href="/deportes">DEPORTES &amp; CURSOS</a></li>
      <li style="margin: 1%;"><a href="/eventos">CENTRO DE EVENTOS</a></li>
      <li style="margin: 1%;"><a href="/blog">BLOG</a></li>
      <li style="margin: 1%;"><a href="/contacto">CONTÁCTENOS</a></li>
      </ul>
      </nav>
    </section>

   <section class="container" style="width: 100%;margin-top: 4%;">
    	<div class="container" style="display: flex;justify-content: center;">
    <img src="{{url('images/flecha-banner.png')}}" alt="left-arrow" style="position: absolute;left: 8.3%;top: 12%;">
    	<img src="{{url('images/banner-principal-spa.jpg')}}" alt="banner-principal-spa">
    	<img src="{{url('images/flecha-banner.png')}}" alt="right-arrow" style="transform: rotate(180deg);position: absolute;left: 90.08%;top: 12%;">
    	</div>
    </section>
	<section class="container" style="width: 100%;display:  flex;justify-content:  center;">
    	<img src="{{url('images/banner-secundario-spa.jpg')}}" alt="banner-secundario-spa">
    </section>
   <section class="container" style="width: 100%;margin-top: 20%;display:  flex;justify-content:  flex-start;background-image: url('{{url('images/fondo.jpg')}}');background-repeat: no-repeat;background-position: center; background-size: cover;margin-bottom: 20%;">
    	
    		<div style="width: 30%;margin: 2.5%;">
    		<h2 style="font-family: 'light';color: #fff;">NOSOTROS</h2>
    		<br>
    		<p style="font-family: 'light';color: #fff;">Aquí se coloca una descripción que hable sobre que es el club Dhuchi, es totalmente diferente a las otras partes de la página, debe ser muy general sin espeificar los servicios. Se recomienda que no sea más de 134 caracteres</p>
    		</div>
    	</section>
    		
    		<div>
    		<img src="{{url('images/imagen-nosotros.jpg')}}" alt="banner-peluqueria" style="width: 44%;position:  absolute;top: 29%;left: 51%;">
    		</div>
    		<br>
    	<section class="container">
      		<div>
      		<h1 style="font-size: 2.8em;margin-bottom: 1%;">NUESTROS SERVICIOS</h1>
      		<img src="{{url('images/decoracion-spa.png')}}" alt="decoracion" style="width: 37%;">
      		</div>
    	</section>

    	<section class="container" style="width: 100%;display: flex;flex-wrap: wrap;margin-top: 8%;">
    		<div class="img-container">
    			<img src="{{url('images/spa-photo.jpg')}}" class="img-spa">
    		</div>
    		<div class="img-container">
    			<img src="{{url('images/spa-photo.jpg')}}" class="img-spa">
    		</div>
    		<div class="img-container">
    			<img src="{{url('images/spa-photo.jpg')}}" class="img-spa">
    		</div>
    		<div class="img-container">
    			<img src="{{url('images/spa-photo.jpg')}}" class="img-spa">
    		</div>
    		<div class="img-container">
    			<img src="{{url('images/spa-photo.jpg')}}" class="img-spa">
    		</div>
    		<div class="img-container">
    			<img src="{{url('images/spa-photo.jpg')}}" class="img-spa">
    		</div>
    		<div class="img-container">
    			<img src="{{url('images/spa-photo.jpg')}}" class="img-spa">
    		</div>
    		<div class="img-container">
    			<img src="{{url('images/spa-photo.jpg')}}" class="img-spa">
    		</div>
    	</section>

    	<section class="container" style="width: 100%;padding: 2%;margin-top: 2%;margin-bottom: 2%;">
    		<img src="{{url('images/banner-promocion-grande.jpg')}}" style="width: 100%;">
    	</section>

    	<section class="container" style="margin-top: 15%;margin-bottom: 5%;">
      		<div>
      		<h1 style="font-size: 2.8em;margin-bottom: 1%;">NUESTROS PLANES</h1>
      		<img src="{{url('images/decoracion-spa.png')}}" alt="decoracion" style="width: 32.4%;">
      		</div>
    	</section>

  <section class="container" style="display: flex;flex-direction: row;">
      <div style="width: 60%;">
       <img src="{{url('images/flecha-banner.png')}}" alt="flecha-banner" style="position: absolute;top: 85.5%;left: 4.8%;">
        <img src="{{url('images/spa1.jpg')}}" alt="eventos-especiales" style="width: 100%;height: 30em;margin-top: 5%;" class="img-btn">
      </div>
     <div style="width: 40%;">
        <div style="margin: 14% 0% 1% 64%;">
          <a href="#"><img src="{{url('images/boton-mas-ofertas.png')}}" alt="all-offers"></a>
        </div>
       <div style="position: absolute;z-index: 2;color: white;top: 84.4%;left: 59%;width: 31%;">
        <h2 style="font-size:  1.5em;">NOMBRE DE LA OFERTA</h2>
        <br>
        <p>Aquí se coloca una descripción que hable acerca de que es el club dhuchi, es totalmente diferente a las oras partes de la página. Debe ser muy general, sin especificar los servicios, se recomienda que no sea más de 134 caracteres. <a href="#" style="color: #fff;">Leer más</a></p>
        <br>
        <a href="#">
          <img src="{{url('images/boton-compra-eventos-especiales.png')}}" alt="boton-compra-eventos-especiales" class="img-btn">
        </a>
        <a href="#" style="color: #7ab527;margin-left: 59%;">Términos y condiciones</a>
        </div>
      <img src="{{url('images/complemento-es.png')}}" alt="complemento" style="position:  absolute;left: 42%;margin-top: 1%;width: 56%;z-index: 1;">
       <img src="{{url('images/flecha-banner.png')}}" alt="flecha-banner" style="position: absolute;top: 85.5%;left: 96.4%;transform:  rotate(180deg);z-index: 2;">
    </div>

</section>
	<br>
	<div style="width: 100%;display: flex;justify-content:  center;margin: 4% 0%;">
      <img src="{{url('images/flecha-verde.jpg')}}" alt="flecha-verde">
    </div>

   <section class="container" style="display: flex;justify-content: space-between;margin-bottom: 5%;">
    	<img src="images/flecha-aliados.png" style="position: absolute;top: 96%;">
		<img src="{{url('images/imagen-spa.png')}}">
		<img src="{{url('images/imagen-spa.png')}}">
		<img src="{{url('images/imagen-spa.png')}}">
		<img src="{{url('images/imagen-spa.png')}}">
    	<img src="images/flecha-aliados.png" style="position: absolute;top: 96%;left: 92.5%;transform: rotate(180deg);">
    </section>
    	
@endsection