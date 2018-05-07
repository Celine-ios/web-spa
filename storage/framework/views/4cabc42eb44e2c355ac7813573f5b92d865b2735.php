<?php $__env->startSection('content'); ?>


<section class="content-header">
	<h1 class="text-center">Administración de Banners</h1>
</section>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de Tipos de Banner</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content"></div>
		<div class="row">
			<div class="col-sm-12" id="contenido_principal">
				<div id="list-loteria">
					<table class="table" role="grid" aria-describedby="datatable_info">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Banners Existentes</th>
							<th></th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $btypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $btype): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<td><?php echo e($btype->id); ?></td>
								<td><?php echo e($btype->nombre); ?></td>
								<td><?php echo e($btype->descripcion); ?></td>
								<td><?php echo e($btype->banners->count()); ?></td>
								<td class="alin">
									<a href="<?php echo e(route('admin.banner.edit', $btype->id)); ?>" class="btn btn-warning">
										<i class="fa fa-picture-o" aria-hidden="true"></i>
									</a>&nbsp;
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</tbody>
					</table>

					<div class="text-center">
						<?php echo e($btypes->links()); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>