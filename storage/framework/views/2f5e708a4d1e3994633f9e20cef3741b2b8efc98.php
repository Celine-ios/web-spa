<?php if(count($errors) > 0): ?>
<!-- Messenger http://github.hubspot.com/messenger/ -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script type="text/javascript">
	toastr.options = {
		"closeButton": true,
		"newestOnTop": true,
		"positionClass": "toast-top-right"
	};

	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	toastr["error"]("<?php echo e($error); ?>","<?php echo e(config('app.name')); ?>");
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</script>
<?php endif; ?>

<?php if(Session::has('message')): ?>
<!-- Messenger http://github.hubspot.com/messenger/ -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script type="text/javascript">
	toastr.options = {
		"closeButton": true,
		"newestOnTop": true,
		"positionClass": "toast-top-right"
	};

	toastr["success"]("<?php echo e(Session::get('message')); ?>","<?php echo e(config('app.name')); ?>");
</script>
<?php endif; ?>

<?php if(Session::has('message-error')): ?>
<!-- Messenger http://github.hubspot.com/messenger/ -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script type="text/javascript">
	toastr.options = {
		"closeButton": true,
		"newestOnTop": true,
		"positionClass": "toast-top-right"
	};

	toastr["error"]("<?php echo e(Session::get('message-error')); ?>","<?php echo e(config('app.name')); ?>");
</script>
<?php endif; ?>