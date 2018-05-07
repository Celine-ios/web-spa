@extends('admin.layout.index')
@section('content')


<section class="content-header">
	<h1 class="text-center">Administración de Tipos de Banner</h1>
</section>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nuevo Tipo de Banner</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.btype.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-5">
					{!!Form::label('name', 'Nombre')!!}<br>
					{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo tipo de banner'])!!}
				</div>

				<div class="col-sm-5">
					{!!Form::label('name', '&nbsp;')!!}<br>
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
							<th></th>
						</thead>
						<tbody>
							@foreach($btypes as $btype)
							<tr>
								{!!Form::model($btype,['route'=>['admin.btype.update', $btype->id],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
								<td>{{$btype->id}}</td>
								<td>{!!Form::text('nombre', $btype->nombre, ['class'=>'form-control'])!!}</td>
								<td class="alin">{!!Form::button('<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-primary	'))!!}{!!Form::close()!!}&nbsp;{!!Form::open(['route'=> ['admin.btype.destroy', $btype->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $btypes->links() }}
					<div class="text-center"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
