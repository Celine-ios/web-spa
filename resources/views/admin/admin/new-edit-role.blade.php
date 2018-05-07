@extends('admin.layout.index')
@section('content')
@section('styles')
{!!Html::style('/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')!!}
@endsection

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Roles de Usuarios</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@if(isset($role))
		{!!Form::model($role,['route'=>['admin.role.update',$role->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'roleForm', 'novalidate'])!!}
		@else
		{!!Form::open(['route'=>'admin.role.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data', 'id' => 'roleForm', 'novalidate'])!!}
		@endif
		<div class="x_content"></div>
		<div class="row">
			<div class="form-group">
				{!!Form::label('display_name', 'Nombre', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('display_name', null, ['class'=>'form-control', 'placeholder' => 'Inserte título', 'required'])!!}
					<span class="label label-danger">{{$errors->first('display_name') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('description', 'Descripción', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('description', null, ['class'=>'form-control', 'placeholder' => 'Inserte Descripción', 'required'])!!}
					<span class="label label-danger">{{$errors->first('description') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('permissions', 'Permisos', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
				{!!Form::select('permissions[]', $permissions, $assigned, ['class' => 'form-control', 'title' => 'Seleccione un Permiso de Usuario', 'data-header' => 'Seleccione un Permiso de Usuario', 'multiple','required', 'id' => 'tags'])!!}
					<span class="label label-danger">{{$errors->first('permissions') }}</span>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="x_content"></div>
				{!!Form::button('<i class="fa fa-check" aria-hidden="true"></i> Guardar', array('type' => 'submit', 'class'=>'btn btn-success btn-block btn-lg'))!!}
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
{!!Html::script('/vendors/ckeditor/ckeditor.js')!!}
{!!Html::script('/vendors/ckeditor/adapters/jquery.js')!!}
<script type="text/javascript">
	$('select').selectpicker();
	$("#roleForm").validate();
</script>
@endsection
