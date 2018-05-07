@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Usuarios</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@if(isset($user))
		{!!Form::model($user,['route'=>['admin.user.update',$user->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'userForm', 'novalidate'])!!}
		@else
		{!!Form::open(['route'=>'admin.user.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data', 'id' => 'userForm', 'novalidate'])!!}
		@endif
		<div class="x_content"></div>
		<div class="row">
			<div class="x_content"></div>
			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
				{!!Form::label('name', 'Nombre', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nombre Completo', 'required'])!!}
					<span class="label label-danger">{{$errors->first('name') }}</span>
				</div>
			</div>

			<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
				{!!Form::label('username', 'Nombre de Usuario', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('username', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Usuario', 'required'])!!}
					<span class="label label-danger">{{$errors->first('username') }}</span>
				</div>
			</div>

			<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
				{!!Form::label('email', 'Correo Electrónico', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::email('email', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Usuario', 'required'])!!}
					<span class="label label-danger">{{$errors->first('email') }}</span>
				</div>
			</div>

			<div class="form-group {{ $errors->has('roles') ? ' has-error' : '' }}">
				{!!Form::label('roles', 'Roles de Usuario', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::select('roles[]', $roles, $assigned, ['class' => 'form-control', 'title' => 'Seleccione un Rol de Usuario', 'data-header' => 'Seleccione un Rol de Usuario', 'multiple', 'id' => 'roles', 'required'])!!}
					<span class="label label-danger">{{$errors->first('roles') }}</span>
				</div>
			</div>
			<div class="col-sm-12" id="contenido_principal">
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
	$("#userForm").validate();
</script>
@endsection
