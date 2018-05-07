@extends('user.layout.auth')

<!-- Main Content -->
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>¿Olvidaste tu Contraseña?</h4>
                </div>
                <div class="panel-body capa-login">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    {!!Form::open(['url'=>'/user/password/email', 'method'=>'POST'])!!}
                    {{ csrf_field() }}
                    <div class="group {{ $errors->has('email') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::email('email', null, ['class'=>'form-control text-center'])!!}
                        <span class="label label-danger">{{$errors->first('email') }}</span>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        {!!Form::label('email', 'Correo Electrónico', ['class'=>' control-label'])!!}
                    </div>

                    <div class="col-sm-12" id="contenido_principal">
                        <div class="x_content"></div>
                        {!!Form::button('<i class="fa fa-key" aria-hidden="true"></i> Reestablece tu Contraseña', array('type' => 'submit', 'class'=>'btn-material btn-block btn-lg'))!!}
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
