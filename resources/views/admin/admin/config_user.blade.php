@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Configuración de Usuario</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		{!!Form::model(Auth::guard('admin')->user(),['route'=>['admin.profile'],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
		<div class="x_content"></div>
		<div class="row">
			<div class="x_content"></div>
			<div class="form-group">
				{!!Form::label('name', 'Nombre', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nombre', 'required'])!!}
					<span class="label label-danger">{{$errors->first('name') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('username', 'Nombre de Usuario', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('username', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Usuario', 'disabled'])!!}
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

			<div class="form-group">
				{!!Form::label('password','Contraseña:', ['class' => 'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}
					<span class="label label-danger">{{$errors->first('password') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!Form::label('password_confirmation','Confirmar Contraseña:', ['class' => 'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}
					<span class="label label-danger">{{$errors->first('password_confirmation') }}</span>
				</div>
			</div>

			<div class="col-sm-12" id="contenido_principal">
				<div class="x_content"></div>
				{!!Form::button('<i class="fa fa-check" aria-hidden="true"></i> Guardar', array('type' => 'submit', 'class'=>'btn btn-success btn-block btn-lg'))!!}
			</div>
		</div>

		{!!Form::close()!!}
	</div>
</div>
@endsection
