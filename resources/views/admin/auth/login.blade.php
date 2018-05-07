<!DOCTYPE html>
<html lang="es"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Reckless Pro | Inicia Sesión</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/png" href="{{url('/images/icono.png')}}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{!! Html::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700')!!}
    {!! Html::style('/vendors/bootstrap/dist/css/bootstrap.min.css')!!}
    {!! Html::style('/vendors/components-font-awesome/css/font-awesome.min.css')!!}
	{!! Html::style('/css/admin-login.css')!!}
</head>
<body>
	<div id="container">
		<div id="logo">
			{!! Html::image('/img/logo.png')!!}
		</div>
        <div id="loginbox">
            @include('vendor.toast.messages-jquery')
        	{!!Form::open(array('url' => 'admin/login'))!!}
        	{!! csrf_field() !!}
        	<p>Introduzca usuario y contraseña para continuar.</p>
        	<div class="input-group input-sm{{ $errors->has('username') ? ' has-error' : '' }}">
        		<span class="input-group-addon">
        			<i class="fa fa-user"></i>
        		</span>
        		{!!Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'Ingresa tu nombre de usuario', 'value' => old('username')])!!}
            </div>
            <strong>{{ $errors->first('username') }}</strong>
        	<div class="input-group input-sm{{ $errors->has('username') ? ' has-error' : '' }}">
        		<span class="input-group-addon">
        			<i class="fa fa-lock"></i>
        		</span>
        		{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}
        	</div>
            <strong>{{ $errors->first('password') }}</strong>
        	<div class="form-actions clearfix">
        		{!!Form::submit('Iniciar',['class'=>'btn btn-primary'])!!}
        	</div>
        	{!!Form::close()!!}
        </div>
		<br/>
		<div class="footlo"><p>By Exala Innovacion Digital S.A.S. | <i class="fa fa-copyright" aria-hidden="true"></i> 2017</p></div>
	</div>
</body>
</html>
