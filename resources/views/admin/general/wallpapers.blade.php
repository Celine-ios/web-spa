@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Wallpapers</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nuevo Wallpaper</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.wallpaper.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data'])!!}
			<div class="form-group">
				<div class="col-sm-6">
					<label for="">Menú</label><br>
					{!!Form::select('tipo_archivo', $types, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Tipo de Wallpaper'])!!}
				</div>
				<div class="col-sm-5">
					<label for="">Link</label><br>
					{!!Form::text('link', null, ['class'=>'form-control', 'placeholder' => 'Inserte link objetivo'])!!}
				</div>
				<div class="col-sm-1">
					<label for="">&nbsp;</label><br>
					{!!Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-primary'))!!}
				</div>
				<div class="col-sm-12">
					<label for="">Link</label><br>
					{!!Form::file('link_imagen', ['class' => 'form-control'])!!}
				</div>

			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de Banners</h2>
			<ul class="nav navbar-right panel_toolbox"><li></li></ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content"></div>
		<div class="row">
			<div class="col-sm-12" id="contenido_principal">
				<div id="list-loteria">
					<table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
						<thead>
							<th>ID</th>
							<th>Link Objetivo</th>
							<th>Menú de Origen</th>
							<th>Imagen</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($wallpapers as $wallpaper)
							<tr>
								{!!Form::model($wallpaper,['route'=>['admin.wallpaper.update',$wallpaper->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data'])!!}
								<td>{{$wallpaper->id}}</td>
								<td>{!!Form::text('link', $wallpaper->link, ['class'=>'form-control'])!!}&nbsp;{!!link_to($wallpaper->link, 'Ver', ['class'=>'btn btn-primary', 'target' => '_new'])!!}</td>
								<td>{!!Form::select('tipo_archivo', $types, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Tipo de Wallpaper'])!!}</td>
								<td>
									@if(in_array($wallpaper->tipo_archivo, ['imagen', 'image']))
									{!!Html::image('images/wallpapers/'.$wallpaper->link_imagen, null, ['height' => '50'])!!}{!!Form::file('link_imagen', ['class' => 'form-control'])!!}
									@endif
								</td>
								<td class="alin">{!!Form::button('<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-success'))!!}{!!Form::close()!!}&nbsp;{!!Form::open(['route'=> ['admin.wallpaper.destroy', $wallpaper->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $wallpapers->links() }}
					<div class="text-center"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
