<?php if(Route::current()->getURI() !== 'view_cart' && count($cart_list) > 0): ?>
<div class="fixed-action-btn" id="btn-cart" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large btn-tauret" data-toggle="modal" data-target="#cart-modal">
        <i class="fa fa-shopping-cart"></i><span>Cart</span> </a><span class="badge social-counter"><?php echo e($cart_list->count()); ?></span>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="cart-modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-cart">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Carrito de Compras</h5>
            </div>
            <div class="modal-body">
                <table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
                    <thead>
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Precio Unitario</th>
                        <th>Precio</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $cart_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($product->qty); ?></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e(cop_format($product->price + $product->tax)); ?></td>
                            <td><?php echo e(cop_format(round(($product->price * $product->qty) + ($product->tax * $product->qty)))); ?></td>
                            <td><a href="<?php echo e(url('remove_cart/'.$product->rowId)); ?>" class="secondary-content"><i class="material-icons">close</i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>

                <ul class="collection">
                    <li class="collection-item total">
                        <h5>Total  <span class="label total"><?php echo e(cop_format(round($cart_price))); ?></span></h5>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="<?php echo e(url('view_cart')); ?>" class="btn btn-tauret btn-small pull-right"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Pagar Cart</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->startSection('add_js'); ?>
<?php echo e(Html::script('/js/forms.js')); ?>

<?php echo e(Html::script('/js/cart.js')); ?>

<?php echo e(Html::script('https://apis.google.com/js/api:client.js')); ?>

<?php echo e(Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfgqIoM2rtSqfTQIEpugy6t3qJBD07vI&libraries=places&callback=initAutocomplete', ['async','defer'])); ?>

<?php $__env->stopSection(); ?>
<!-- Modal -->
<?php endif; ?>
