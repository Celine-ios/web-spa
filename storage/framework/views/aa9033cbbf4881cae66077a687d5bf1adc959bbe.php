<?php $__env->startSection('body'); ?>
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
      <li style="margin: 1%;"><a href="/deportes" class="selected">DEPORTES &amp; CURSOS</a></li>
      <li style="margin: 1%;"><a href="/eventos">CENTRO DE EVENTOS</a></li>
      <li style="margin: 1%;"><a href="/blog">BLOG</a></li>
      <li style="margin: 1%;"><a href="/contacto">CONTÁCTENOS</a></li>
      </ul>
      </nav>
    </section>
	<section style="width: 100%;margin-top: 4%;">
    	<div style="display: flex;justify-content: center;">
    <img src="<?php echo e(url('images/flecha-banner.png')); ?>" alt="left-arrow" style="position: absolute;left: 0.9%;top: 12%;">
    	<img src="<?php echo e(url('images/banner-principal-deportes.png')); ?>" alt="banner-principal-deportes" style="width: 98%;">
    	<img src="<?php echo e(url('images/flecha-banner.png')); ?>" alt="right-arrow" style="transform: rotate(180deg);position: absolute;left: 97.35%;top: 12%;">
    	</div>
    </section>
    <section style="width: 100%;display:  flex;justify-content:  center;">
    	<img src="<?php echo e(url('images/banner-secundario-deportes.png')); ?>" alt="banner-secundario-deportes" style="margin-top: -2%;width: 98.2%;">
    </section>
    <div class="container" style="margin-top: 4%;">
    	<h1 style="font-size: 3.8em;margin-left: 4%;">DEPORTES</h1>
    </div>

    <section style="width: 100%;display: flex;flex-direction: row;">
    	<div style="width: 80%;display:  flex;">
    	<img src="<?php echo e(url('images/foto-deportes.png')); ?>" alt="deportes" style="margin-left: -7%;width: 100%;">
    	</div>
    	<div style="width: 50%;margin: 10% 4% 0% 0%;font-family: 'light';">
    		<h2 style="text-align: right;">POLO</h2>
    		<br>
    		<p style="font-family: 'light';text-align: right;">Aquí se coloca una descripción que hable sobre que es el club Dhuchi, es totalmente diferente a las otras partes de la página, debe ser muy general sin espeificar los servicios. Se recomienda que no sea más de 134 caracteres</p>
    		<br>
    		<img src="<?php echo e(url('images/leer-mas-deportes.png')); ?>" alt="leer-mas-deportes" style="margin-left: 7%;">
    	</div>
	</section>
	<section style="width: 100%;display: flex;flex-direction: row-reverse;margin-top:  -8.6%;">
    	<div style="width: 87%;display:  flex;justify-content: flex-end;">
    	<img src="<?php echo e(url('images/foto-deportes.png')); ?>" alt="deportes" style="margin-right: -10%;width: 100%;">
    	</div>
    	<div style="width: 50%;margin: 10% 0% 0% 4%;font-family: 'light';">
    		<h2 style="text-align: left;">TENIS</h2>
    		<br>
    		<p style="font-family: 'light';text-align: left;">Aquí se coloca una descripción que hable sobre que es el club Dhuchi, es totalmente diferente a las otras partes de la página, debe ser muy general sin espeificar los servicios. Se recomienda que no sea más de 134 caracteres</p>
			<br>
			<img src="<?php echo e(url('images/leer-mas-deportes.png')); ?>" alt="leer-mas-deportes">
    	</div>
	</section>
	<section style="width: 100%;display: flex;flex-direction: row;margin-top: -8.6%;">
    	<div style="width: 80%;display:  flex;">
    	<img src="<?php echo e(url('images/foto-deportes.png')); ?>" alt="deportes" style="margin-left: -7%;width: 100%;">
    	</div>
    	<div style="width: 50%;margin: 10% 4% 0% 0%;font-family: 'light';">
    		<h2 style="text-align: right;">NATACIÓN</h2>
    		<br>
    		<p style="font-family: 'light';text-align: right;">Aquí se coloca una descripción que hable sobre que es el club Dhuchi, es totalmente diferente a las otras partes de la página, debe ser muy general sin espeificar los servicios. Se recomienda que no sea más de 134 caracteres</p>
    		<br>
    		<img src="<?php echo e(url('images/leer-mas-deportes.png')); ?>" alt="leer-mas-deportes" style="margin-left: 7%;">
    	</div>
	</section>
	<section style="margin: 4% 0%;">
		<img src="<?php echo e(url('images/banner-terciario-deporte.png')); ?>" alt="banner-terciario-deporte" style="width: 102%;margin-left:  -1%;">
	</section>
	<div class="container" style="margin: 10% 0%;">
    	<h1 style="font-size: 3.8em;margin-left: 4%;">CURSOS</h1>
    </div>
    <section class="container" style="margin-bottom: 6%;">
    	<div>
    		<img src="<?php echo e(url('images/danza.png')); ?>" alt="danza">
    	</div>
    	<div style="width: 48%;border-radius:  1%;box-shadow:  black 0px 0px 10px;padding: 2%;position: absolute;top: 77%;left: 48%;background:  #fff;">
    		<h2 style="font-family: 'light';">DANZA</h2>
    		<br>
    		<p style="font-family: 'light';">Aquí se coloca una descripción que hable sobre que es el club Dhuchi, es totalmente diferente a las otras partes de la página, debe ser muy general sin espeificar los servicios. Se recomienda que no sea más de 134 caracteres</p>
    		<br>
    		<img src="<?php echo e(url('images/leer-mas-deportes.png')); ?>" alt="leer-mas-deportes" style="margin-left: 7%;float: right;" class="img-btn">
    	</div>
	</section>

	<section class="container" style="display: flex;justify-content: flex-end;margin-bottom: 20%;">
		<div>
			<img src="<?php echo e(url('images/danza.png')); ?>" alt="karate">
		</div>
		<div style="width: 48%;border-radius:  1%;box-shadow:  black 0px 0px 10px;padding: 2%;position: absolute;top: 97%;left: 4%;background:  #fff;">
    		<h2 style="font-family: 'light';">KARATE</h2>
    		<br>
    		<p style="font-family: 'light';">Aquí se coloca una descripción que hable sobre que es el club Dhuchi, es totalmente diferente a las otras partes de la página, debe ser muy general sin espeificar los servicios. Se recomienda que no sea más de 134 caracteres</p>
    		<br>
    		<img src="<?php echo e(url('images/leer-mas-deportes.png')); ?>" alt="leer-mas-deportes" style="margin-left: 7%;float: right;" class="img-btn">
    	</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>