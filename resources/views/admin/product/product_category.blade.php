@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Categorías de Productos</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nueva Categoría de Producto</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.product_category.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-5">
					<label for="">Nombre</label><br>
					{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa una nueva categoría de producto'])!!}
				</div>
				<div class="col-sm-5">
					<label for="">Descripción</label><br>
					{!!Form::text('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripción de la Categoría'])!!}
				</div>
				<div class="col-sm-2">
					<label for="">&nbsp;</label><br>
					{!!Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Guardar', array('type' => 'submit', 'class'=>'btn btn-primary'))!!}
				</div>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de Categorías de Productos</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>

				</li>
			</ul>
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
							<th></th>
						</thead>
						<tbody>
							@foreach($pcats as $pcat)
							<tr>
								{!!Form::model($pcat,['route'=>['admin.product_category.update', $pcat->id],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
								<td>{{$pcat->id}}</td>
								<td>{!!Form::text('nombre', $pcat->nombre, ['class'=>'form-control'])!!}</td>
								<td>{!!Form::text('descripcion', $pcat->description, ['class'=>'form-control'])!!}</td>
								<td class="alin">{!!Form::button('<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-primary	'))!!}{!!Form::close()!!}&nbsp;{!!Form::open(['route'=> ['admin.product_category.destroy', $pcat->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="text-center">{{ $pcats->links() }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
