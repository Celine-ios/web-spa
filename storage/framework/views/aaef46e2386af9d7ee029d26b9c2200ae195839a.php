<?php $__env->startSection('content'); ?>
<!-- page content -->

<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Clientes</span>
        <div class="count"><?php echo e($users['total']); ?></div>
        <span class="count_bottom">
            <?php if($users['new'] > 0): ?>
            <i class="green"><i class="fa fa-sort-asc"></i><?php echo e($users['new']); ?> </i> usuarios nuevos
            <?php else: ?>
            <?php echo e($users['new']); ?> usuarios nuevos
            <?php endif; ?>
        </span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-shopping-cart"></i> Productos</span>
        <div class="count"><?php echo e($products['total']); ?></div>
        <span class="count_bottom">
            <?php if($products['new'] > 0): ?>
            <i class="green"><i class="fa fa-sort-asc"></i><?php echo e($products['new']); ?> </i> productos nuevos
            <?php else: ?>
            <?php echo e($products['new']); ?> productos nuevos
            <?php endif; ?>
        </span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Pedidos</span>
        <div class="count"><?php echo e($orders['total']); ?></div>
        <?php if($orders['new'] > 0): ?>
        <i class="green"><i class="fa fa-sort-asc"></i><?php echo e($orders['new']); ?> </i> pedidos nuevos
        <?php else: ?>
        <?php echo e($orders['new']); ?> pedidos nuevos
        <?php endif; ?>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Ventas Contraentrega</span>
        <div class="count"><?php echo e($contra['total']); ?></div>
        <?php if($contra['new'] > 0): ?>
        <i class="green"><i class="fa fa-sort-asc"></i><?php echo e($contra['new']); ?> </i> pedidos nuevos
        <?php else: ?>
        <?php echo e($contra['new']); ?> pedidos nuevos
        <?php endif; ?>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Ventas en Línea</span>
        <div class="count"><?php echo e($linea['total']); ?></div>
        <?php if($linea['new'] > 0): ?>
        <i class="green"><i class="fa fa-sort-asc"></i><?php echo e($linea['new']); ?> </i> pedidos nuevos
        <?php else: ?>
        <?php echo e($linea['new']); ?> pedidos nuevos
        <?php endif; ?>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Ventas Linio</span>
        <div class="count"><span class="label label-success pull">Muy Pronto</span></div>
    </div>
</div>
<!-- /top tiles -->

<!--Estadisticas de la tienda-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel tile fixed_height_320">
            <div class="x_title">
                <h3>Productos más vendidos <small>Tienda Online</small></h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php $__currentLoopData = $ventas['productos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <span><?php echo e($producto['nombre']); ?></span>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo e($producto['valor']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e(($producto['valor'] * 100) / $ventas['total']); ?>%;">
                            <span><?php echo e($producto['valor']); ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>
    </div>
</div>
<!--fin estadisticas de la tienda-->


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Network Activities <small>Graph title sub-title</small></h3>
                </div>
                <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-9 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                <div style="width: 100%;">
                    <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                        <p>Facebook Campaign</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Twitter Campaign</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                        <p>Conventional Media</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Bill boards</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Visitors location <small>geo-presentation</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="dashboard-widget-content">
                    <div class="col-md-4 hidden-small">
                        <h2 class="line_30">125.7k Views from 60 countries</h2>

                        <table class="countries_list">
                            <tbody>
                                <tr>
                                    <td>United States</td>
                                    <td class="fs15 fw700 text-right">33%</td>
                                </tr>
                                <tr>
                                    <td>France</td>
                                    <td class="fs15 fw700 text-right">27%</td>
                                </tr>
                                <tr>
                                    <td>Germany</td>
                                    <td class="fs15 fw700 text-right">16%</td>
                                </tr>
                                <tr>
                                    <td>Spain</td>
                                    <td class="fs15 fw700 text-right">11%</td>
                                </tr>
                                <tr>
                                    <td>Britain</td>
                                    <td class="fs15 fw700 text-right">10%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>