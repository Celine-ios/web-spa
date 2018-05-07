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

.food-box {

    width: 23%;
    margin: 1%;
    margin-bottom: 8%;
    padding: 0% 4%;
    text-align: center;

}

.circle-box {

	display: flex;
	flex-direction: column;
	text-align: center;
	font-family: 'light';

}

</style>
   <section style="margin-top: 5%;">
      <nav class="navbar" style="margin: 0 auto;margin-top: 1%;width: 98%;color: #fff;">
        <ul style="display: flex;list-style-type: none;background:  grey;justify-content:  center;">
      <li style="margin: 1%;"><a href="/">INICIO</a></li>
      <li style="margin: 1%;"><a href="/spa">BIENESTAR &amp; SPA</a></li>
      <li style="margin: 1%;"><a href="/restaurant" class="selected">RESTAURANTE &amp; BAR</a></li>
      <li style="margin: 1%;"><a href="/deportes">DEPORTES &amp; CURSOS</a></li>
      <li style="margin: 1%;"><a href="/eventos">CENTRO DE EVENTOS</a></li>
      <li style="margin: 1%;"><a href="/blog">BLOG</a></li>
      <li style="margin: 1%;"><a href="/contacto">CONTÁCTENOS</a></li>
      </ul>
      </nav>
    </section>

     <section class="container" style="width: 100%;margin-top: 4%;">
    	<div class="container" style="display: flex;justify-content: center;">
    <img src="<?php echo e(url('images/flecha-banner.png')); ?>" alt="left-arrow" style="position: absolute;left: 8.3%;top: 14%;">
    	<img src="<?php echo e(url('images/banner-principal-rest.png')); ?>" alt="banner-principal-rest">
    	<img src="<?php echo e(url('images/flecha-banner.png')); ?>" alt="right-arrow" style="transform: rotate(180deg);position: absolute;left: 90.08%;top: 14%;">
    	</div>
    </section>
    <section class="container" style="width: 100%;display:  flex;justify-content:  center;">
    	<img src="<?php echo e(url('images/banner-secundario-rest.png')); ?>" alt="banner-secundario-rest" style="margin-top: -2%;">
    </section>
    <section class="container" style="width: 100%;display:  flex;justify-content:  center;margin-left: 1%;">
    	<img src="<?php echo e(url('images/txt-rest.png')); ?>" alt="text-rest" style="margin-top: 2%;">
    </section>
    <div style="width: 100%;display: flex;justify-content:  center;margin: 4% 1%;">
      <img src="<?php echo e(url('images/flecha-verde.jpg')); ?>" alt="flecha-verde" style="transform: rotate(180deg);">
    </div>
    <section class="container" style="width: 100%;display: flex;justify-content: flex-start;">
    	<div style="margin: 6%;">
    	<img src="http://127.0.0.1:8000/images/eventos-especiales.jpg" alt="imagen-rest" style="width: 90%;    box-shadow: #00000070 5px 3px 10px;">
    	</div>
    	<div style="margin-top: 14%;font-family: 'light';width: 30%;">
    		<h2>NOSOTROS</h2>
			<br>
			<p style="font-family: 'light';">Aquí se coloca una descripción que hable sobre el club Dhuchi, debe ser diferente a otras partes de la pagina, debe ser muy general sin especificar los servicios, se recomienda que no sea más de 134 caracteres</p>
			<br>
			<div>
				<img src="<?php echo e(url('images/leer-mas.png')); ?>" alt="leer-mas" class="img-btn">
			</div>
    	</div>
    </section>
	<section class="container" style="margin-top: 15%;margin-bottom: 5%;">
      		<div>
      		<h1 style="font-size: 2.8em;margin-bottom: 1%;">NUESTRO MENÚ</h1>
      		<img src="<?php echo e(url('images/decoracion-spa.png')); ?>" alt="decoracion">
      		<img src="<?php echo e(url('images/descargar-menu.png')); ?>" alt="descargar-menu" style="margin-left: 89%;">
      		</div>
    	</section>

    	<section class="container" style="width: 100%;display: flex;justify-content: space-around;flex-wrap: wrap;margin: 4% 0%;">
    		<div class="food-box">
    			<img src="<?php echo e(url('images/comida.png')); ?>" alt="food-photo">
    			<h4 style="color: #7ab527;">Nombre del Plato</h4>
    			<img src="<?php echo e(url('images/estrellas.png')); ?>" alt="estrellas">
    			<p style="margin-top: 4%;">Descripción del Plato</p>
    		</div>
    		<div class="food-box">
    			<img src="<?php echo e(url('images/comida.png')); ?>" alt="food-photo">
    			<h4 style="color: #7ab527;">Nombre del Plato</h4>
    			<img src="<?php echo e(url('images/estrellas.png')); ?>" alt="estrellas">
    			<p style="margin-top: 4%;">Descripción del Plato</p>
    		</div>
    		<div class="food-box">
    			<img src="<?php echo e(url('images/comida.png')); ?>" alt="food-photo">
    			<h4 style="color: #7ab527;">Nombre del Plato</h4>
    			<img src="<?php echo e(url('images/estrellas.png')); ?>" alt="estrellas">
    			<p style="margin-top: 4%;">Descripción del Plato</p>
    		</div>
    		<div class="food-box">
    			<img src="<?php echo e(url('images/comida.png')); ?>" alt="food-photo">
    			<h4 style="color: #7ab527;">Nombre del Plato</h4>
    			<img src="<?php echo e(url('images/estrellas.png')); ?>" alt="estrellas">
    			<p style="margin-top: 4%;">Descripción del Plato</p>
    		</div>
    		<div class="food-box">
    			<img src="<?php echo e(url('images/comida.png')); ?>" alt="food-photo">
    			<h4 style="color: #7ab527;">Nombre del Plato</h4>
    			<img src="<?php echo e(url('images/estrellas.png')); ?>" alt="estrellas">
    			<p style="margin-top: 4%;">Descripción del Plato</p>
    		</div>
    		<div class="food-box">
    			<img src="<?php echo e(url('images/comida.png')); ?>" alt="food-photo">
    			<h4 style="color: #7ab527;">Nombre del Plato</h4>
    			<img src="<?php echo e(url('images/estrellas.png')); ?>" alt="estrellas">
    			<p style="margin-top: 4%;">Descripción del Plato</p>
    		</div>
    		<div class="food-box">
    			<img src="<?php echo e(url('images/comida.png')); ?>" alt="food-photo">
    			<h4 style="color: #7ab527;">Nombre del Plato</h4>
    			<img src="<?php echo e(url('images/estrellas.png')); ?>" alt="estrellas">
    			<p style="margin-top: 4%;">Descripción del Plato</p>
    		</div>
    		<div class="food-box">
    			<img src="<?php echo e(url('images/comida.png')); ?>" alt="food-photo">
    			<h4 style="color: #7ab527;">Nombre del Plato</h4>
    			<img src="<?php echo e(url('images/estrellas.png')); ?>" alt="estrellas">
    			<p style="margin-top: 4%;text-align: center;">Descripción del Plato</p>
    		</div>
    	</section>
    	<section class="container" style="margin-top: 15%;margin-bottom: 5%;">
      		<div>
      		<h1 style="font-size: 2.8em;margin-bottom: 1%;">NUESTROS SALONES</h1>
      		<img src="<?php echo e(url('images/decoracion-rest.png')); ?>" alt="decoracion-rest" style="width: 35%;">
      		</div>
    	</section>
		<section class="container" style="display: flex;justify-content: space-between;margin-bottom: 5%;">
    	<div class="circle-box">
		<img src="<?php echo e(url('images/circle.png')); ?>">
		<h2>Pirámide</h2>
		</div>
		<div class="circle-box">
		<img src="<?php echo e(url('images/circle.png')); ?>">
		<h2>Aquanilé</h2>
		</div>
		<div class="circle-box">
		<img src="<?php echo e(url('images/circle.png')); ?>">
		<h2>Mirador</h2>
		</div>
		
    </section>

    <div style="width: 100%;display: flex;justify-content:  center;margin: 4% 0%;">
      <img src="<?php echo e(url('images/flecha-verde.jpg')); ?>" alt="flecha-verde">
    </div>

      <section class="container" style="display: flex;justify-content: space-between;margin-bottom: 5%;margin-top: 2%;">
    	<img src="images/flecha-aliados.png" style="position: absolute;top: 95.5%;">
		<img src="<?php echo e(url('images/imagen-spa.png')); ?>">
		<img src="<?php echo e(url('images/spa2.jpg')); ?>">
		<img src="<?php echo e(url('images/imagen-spa.png')); ?>">
		<img src="<?php echo e(url('images/spa2.jpg')); ?>">
    	<img src="images/flecha-aliados.png" style="position: absolute;top: 95.5%;left: 94.5%;transform: rotate(180deg);">
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>