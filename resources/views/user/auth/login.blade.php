@extends('user.layout.auth')

@section('body')
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Iniciar Sesión</h4>
                </div>
                <div class="panel-body capa-login">
                    <h5>ingresa con:</h5>
                    <br>
                    <div class="botones-redes col-md-12 text-center">

                        <div class="btn-social col-md-4 col-md-offset-2">
                            <a href="{{ url('/auth/facebook') }}" class="btn-material btn-block btn-small indigo"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-social col-md-4">
                            <a href="{{ url('/auth/google') }}" class="btn-material btn-block btn-small red darken-2"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="x_content"></div>
                        {!!Form::open(['route'=>'login', 'method'=>'POST'])!!}
                        {{ csrf_field() }}
                        <div class="group {{ $errors->has('username') ? ' has-error' : '' }} col-sm-12">
                            {!!Form::text('username', null, ['class'=>'form-control text-center'])!!}
                            {!!Form::label('username', 'Nombre de Usuario', ['class'=>' control-label'])!!}
                            <br>
                            <span class="label label-danger">{{$errors->first('username') }}</span>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                        </div>

                        <div class="group {{ $errors->has('password') ? ' has-error' : '' }} col-sm-12">
                            {!!Form::password('password', null, ['class'=>'form-control text-center'])!!}
                            <br>
                            {!!Form::label('password', 'Contraseña', ['class'=>' control-label'])!!}
                            <span class="label label-danger">{{$errors->first('password') }}</span>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                        </div>

                        <div class="col-sm-12" id="contenido_principal">
                            <div class="x_content"></div>
                            {!!Form::button('<i class="fa fa-sign-in" aria-hidden="true"></i> Login', array('type' => 'submit', 'class'=>'btn btn-tauret '))!!}
                            <div style="width:100%; text-align:center">
                                ¿No tiene una cuenta? <a style="padding-left:0px" href="{{ url('/register') }}" class="registro">Regístrarse</a>
                            </div>
                            <div style="width:100%; text-align:center">
                                ¿Olvido su contraseña? <a style="padding-left:0px" href="{{ url('/password/reset') }}" class="registro">Recuperarla</a>
                            </div>

                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
