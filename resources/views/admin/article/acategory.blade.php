@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Categorías de Artículos</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nueva Categoría de Artículo</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.article_category.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-5">
					<label for="">Nombre</label><br>
					{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa una nueva categoría de artículo'])!!}
				</div>
				<div class="col-sm-1">
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
			<h2>Lista de Categorías de Artículos</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content"></div>
		<div class="row">
			<div class="col-sm-12" id="contenido_principal">
				<div id="list-loteria">
					<table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($acats as $acat)
							<tr>
								{!!Form::model($acat,['route'=>['admin.article_category.update', $acat->id],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
								<td>{{$acat->id}}</td>
								<td>{!!Form::text('nombre', $acat->nombre, ['class'=>'form-control'])!!}</td>
								<td class="alin">{!!Form::button('<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-primary	'))!!}{!!Form::close()!!}&nbsp;{!!Form::open(['route'=> ['admin.article_category.destroy', $acat->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $acats->links() }}
					<div class="text-center"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
