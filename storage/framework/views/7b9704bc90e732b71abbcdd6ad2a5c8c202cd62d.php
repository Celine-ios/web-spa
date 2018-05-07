<!DOCTYPE html>
<html lang="es"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Reckless Pro | Inicia Sesión</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/png" href="<?php echo e(url('/images/icono.png')); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo Html::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700'); ?>

    <?php echo Html::style('/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>

    <?php echo Html::style('/vendors/components-font-awesome/css/font-awesome.min.css'); ?>

	<?php echo Html::style('/css/admin-login.css'); ?>

</head>
<body>
	<div id="container">
		<div id="logo">
			<?php echo Html::image('/img/logo.png'); ?>

		</div>
        <div id="loginbox">
            <?php echo $__env->make('vendor.toast.messages-jquery', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        	<?php echo Form::open(array('url' => 'admin/login')); ?>

        	<?php echo csrf_field(); ?>

        	<p>Introduzca usuario y contraseña para continuar.</p>
        	<div class="input-group input-sm<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
        		<span class="input-group-addon">
        			<i class="fa fa-user"></i>
        		</span>
        		<?php echo Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'Ingresa tu nombre de usuario', 'value' => old('username')]); ?>

            </div>
            <strong><?php echo e($errors->first('username')); ?></strong>
        	<div class="input-group input-sm<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
        		<span class="input-group-addon">
        			<i class="fa fa-lock"></i>
        		</span>
        		<?php echo Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña']); ?>

        	</div>
            <strong><?php echo e($errors->first('password')); ?></strong>
        	<div class="form-actions clearfix">
        		<?php echo Form::submit('Iniciar',['class'=>'btn btn-primary']); ?>

        	</div>
        	<?php echo Form::close(); ?>

        </div>
		<br/>
		<div class="footlo"><p>By Exala Innovacion Digital S.A.S. | <i class="fa fa-copyright" aria-hidden="true"></i> 2017</p></div>
	</div>
</body>
</html>
