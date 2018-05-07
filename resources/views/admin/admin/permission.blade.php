@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Permisos de Usuario</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nuevo Permiso de Usuario</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.permission.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-4">
					<label for="">Nombre</label><br>
					{!!Form::text('display_name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo permiso de usuario'])!!}
				</div>
				<div class="col-sm-4">
					<label for="">Descripción</label><br>
					{!!Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo permiso de usuario'])!!}
				</div>
				<div class="col-sm-4">
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
			<h2>Lista de Permisos de Usuario</h2>
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
							<th>Descripción</th>
						</thead>
						<tbody>
							@foreach($permissions as $permission)
							<tr>
								{!! Form::model($permission,
									['route' =>	['admin.permission.update', $permission->id], 'method' => 'PUT', 'class'=> 'form-horizontal']) !!}
									<td>{{$permission->id}}</td>
									<td>{!!Form::text('display_name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo permiso de usuario'])!!}</td>
									<td>{!!Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo permiso de usuario'])!!}</td>
									<td>{!!Form::button('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-primary'))!!}{!!Form::close()!!}&nbsp;{!!Form::open(['route'=> ['admin.permission.destroy', $permission->id] , 'method'=>'DELETE'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="text-center">{{ $permissions->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
