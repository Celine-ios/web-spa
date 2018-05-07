@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Clientes</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@if(isset($user))
		{!!Form::model($user,['route'=>['admin.client.update',$user->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'userForm', 'novalidate'])!!}
		@else
		{!!Form::open(['route'=>'admin.client.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data', 'id' => 'userForm', 'novalidate'])!!}
		@endif
		<div class="x_content"></div>
		<div class="row">
			<div class="x_content"></div>
			<div class="form-group">
				{!!Form::label('name', 'Nombre', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nombre Completo', 'required'])!!}
					<span class="label label-danger">{{$errors->first('name') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('username', 'Nombre de Usuario', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('username', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Usuario', 'required'])!!}
					<span class="label label-danger">{{$errors->first('username') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('email', 'Correo Electrónico', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::email('email', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Usuario', 'required'])!!}
					<span class="label label-danger">{{$errors->first('email') }}</span>
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
