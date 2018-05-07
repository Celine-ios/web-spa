<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<div class="clearfix"></div>
		<ul class="nav side-menu">
			<li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="{{ route('admin.permission.index') }}">Permisos</a></li>
					<li><a href="{{ route('admin.role.index') }}">Roles</a></li>
					<li><a href="{{ route('admin.user.index') }}">Usuarios</a></li>
				</ul>
			</li>
			<li><a><i class="fa fa-cog"></i> Administración <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="{{ route('admin.btype.index') }}">Tipos de Banner</a></li>
					<li><a href="{{ route('admin.banner.index') }}">Banners</a></li>
					<li><a href="{{ route('admin.wallpaper.index') }}">Wallpapers</a></li>
					<li><a href="{{ route('admin.dtype.index') }}">Tipos de Documento</a></li>
					<li><a href="{{ route('admin.document.index') }}">Documentos</a></li>
				</ul>
			</li>

			<li>
				<a><i class="fa fa-file-text-o"></i> Artículos <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="{{ route('admin.article_category.index') }}">Categorías</a></li>
					<li><a href="{{ route('admin.article.index') }}">Artículos</a></li>
				</ul>
			</li>
			<li><a href="{{ route('admin.invitations.index') }}"><i class="fa fa-superpowers"></i> Invitaciones</span></a></li>
			<li><a href="{{ route('admin.pagos.index') }}"><i class="fa fa-money"></i> Pagos</span></a></li>
			<!--<li>
				<a><i class="fa fa-shopping-cart"></i> Parámetros de Tienda <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="{{ route('admin.brand.index') }}">Marcas</a></li>
					<li><a href="{{ route('admin.category_caracteristic.index') }}">Categorias de Caracteristicas</a></li>
					<li><a href="{{ route('admin.product_category.index') }}">Categorias</a></li>
					<li><a href="{{ route('admin.product_subcategory.index') }}">Subcategorias</a></li>
					{{-- <li><a href="{{ route('admin.product_filter.index') }}">Filtros</a></li> --}}
				</ul>
			</li>-->

			<!--<li>
				<a><i class="fa fa-shopping-cart"></i> Tienda <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="{{ route('admin.product.index') }}">Productos</a></li>
					<li><a href="{{ route('admin.discount.index') }}">Descuentos</a></li>
					<li><a href="{{ route('admin.order.index') }}">Órdenes</a></li>
					<li><a href="{{ route('admin.pc_build.index') }}">Configuraciones</a></li>
				</ul>
			</li>-->

			<!--<li><a href="{{ route('admin.client.index') }}"><i class="fa fa-user"></i> Clientes</span></a></li>-->
		</ul>
	</div>
</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
	<a data-toggle="tooltip" data-placement="top">&nbsp;</a>
	<a data-toggle="tooltip" data-placement="top" title="Configuracion" href="{{ route('admin.profile') }}">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión" href="{{ url('admin/logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
</a>
<a data-toggle="tooltip" data-placement="top">&nbsp;</a>
</div>
<!-- /menu footer buttons -->
</div>
</div>
