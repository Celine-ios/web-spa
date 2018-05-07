@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Menús</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nuevo Menú</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.menu.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-4">
					<label for="">Nombre</label><br>
					{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo menú'])!!}
				</div>
				<div class="col-sm-4">
					<label for="">Menú Padre (opcional)</label><br>
					{!!Form::select('menus_id', $menus_2, null, ['class' => 'form-control', 'placeholder'=>'Selecciona un menú padre...'])!!}
				</div>
				<div class="col-sm-2">
					<label for="">Visible</label><br>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary active">
							{{ Form::radio('visible', 1, true, ['autocomplete' => 'off']) }} ON
						</label>
						<label class="btn btn-default">
							{{ Form::radio('visible', 0, false, ['autocomplete' => 'off']) }} OFF
						</label>
					</div>
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
			<h2>Lista de Menús</h2>
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
					<table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th>Menú Principal</th>
							<th>Visible</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($menus as $menu)
							<tr>
								{!!Form::model($menu,['route'=>['admin.menu.update', $menu->id],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
								<td>{{$menu->id}}</td>
								<td>{!!Form::text('nombre', $menu->nombre, ['class'=>'form-control'])!!}</td>
								<td>{!!Form::select('menus_id', $menus_2, null, ['class' => 'form-control', 'placeholder'=>'Selecciona un menú padre...'])!!}</td>
								<td>
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-primary {{($menu->visible ? 'active': '')}}">
											{{ Form::radio('visible', 1, $menu->visible, ['autocomplete' => 'off']) }} ON
										</label>
										<label class="btn btn-default {{(!$menu->visible ? 'active': '')}}">
											{{ Form::radio('visible', 0, !$menu->visible, ['autocomplete' => 'off']) }} OFF
										</label>
									</div>
								</td>
								<td class="alin">{!!Form::button('<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-primary	'))!!}{!!Form::close()!!}&nbsp;{!!Form::open(['route'=> ['admin.menu.destroy', $menu->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $menus->links() }}
					<div class="text-center"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
