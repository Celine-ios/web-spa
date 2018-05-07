@extends('user.layout.home')

@section('body')

<section id="contacto">
  <div class="titulo" style="display:none">

  </div>
    <div class="container">
        <h1 class="text-center">Editar mi perfil</h1>
        <div class="titulo" style="display:none">

  </div>

        <div class="container-fluid">
            <div class="row">
                {!!Form::open(['url'=>'upload_avatar', 'method'=>'POST', 'id' => 'upload_avatar'])!!}
                <div class="col-md-6 col-md-offset-3 col-sm-12">
                    <div class="imagen-circular">
                        @if(empty(Auth::guard('user')->user()->avatar))
                        {!! Html::image('/images/user-default.png')!!}
                        @else
                        {!! Html::image('/images/users/'.Auth::guard('user')->user()->avatar)!!}
                        @endif
                    </div>
                    <div class="group {{ $errors->has('avatar') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('avatar', 'Foto de Perfil', ['class'=>' control-label'])!!}
                        {!!Form::file('avatar', null, ['class'=>'form-control text-center'])!!}
                        <span class="label label-danger">{{$errors->first('avatar') }}</span><br>
                        <span class="image-label label-danger"></span><br>
                    </div>
                </div>
                {!!Form::close()!!}
                {!!Form::model(Auth::guard('user')->user(),['route'=>['perfil'],'method'=>'POST', 'class'=> 'form-horizontal'])!!}
                <div class="col-md-6 col-sm-12">
                    <div class="group {{ $errors->has('first_name') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('first_name', 'Nombres', ['class'=>' control-label'])!!}
                        {!!Form::text('first_name', null, ['class'=>'form-control text-center', 'readonly'])!!}
                        <span class="label label-danger">{{$errors->first('first_name') }}</span><br>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="group {{ $errors->has('last_name') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('last_name', 'Apellidos', ['class'=>' control-label'])!!}
                        {!!Form::text('last_name', null, ['class'=>'form-control text-center', 'readonly'])!!}
                        <span class="label label-danger">{{$errors->first('last_name') }}</span><br>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="group {{ $errors->has('username') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('username', 'Nombre de Usuario', ['class'=>' control-label'])!!}
                        {!!Form::text('username', null, ['class'=>'form-control text-center', 'required'])!!}
                        <span class="label label-danger">{{$errors->first('username') }}</span><br>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="group {{ $errors->has('email') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('email', 'Correo Electrónico', ['class'=>' control-label'])!!}
                        {!!Form::email('email', null, ['class'=>'form-control text-center', 'readonly'])!!}
                        <span class="label label-danger">{{$errors->first('email') }}</span><br>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="group {{ $errors->has('birthday') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('birthday', 'Fecha de Nacimiento', ['class'=>' control-label'])!!}
                        {!!Form::date('birthday', date('Y-m-d'), ['class'=>'form-control text-center', 'max' => date('Y-m-d'), 'required'])!!}
                        <span class="label label-danger">{{$errors->first('birthday') }}</span><br>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="group {{ $errors->has('city') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('city', 'Ciudad', ['class'=>' control-label'])!!}
                        {!!Form::text('city', null, ['class'=>'form-control', 'required', 'id' => 'city'])!!}
                        <span class="label label-danger">{{$errors->first('city') }}</span><br>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="group {{ $errors->has('old_password') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('old_password', 'Antigua Contraseña', ['class'=>' control-label'])!!}
                        {!!Form::password('old_password', null, ['class'=>'form-control text-center', 'required'])!!}
                        <span class="label label-danger">{{$errors->first('old_password') }}</span><br>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="group {{ $errors->has('password') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::label('password', 'Nueva Contraseña', ['class'=>' control-label'])!!}
                        {!!Form::password('password', null, ['class'=>'form-control text-center', 'required'])!!}
                        <span class="label label-danger">{{$errors->first('password') }}</span><br>
                    </div>
                </div>

                <div class="col-sm-4 col-md-offset-4" id="contenido_principal">
                    <div class="x_content"></div>
                    {!!Form::button('<i class="fa fa-user" aria-hidden="true"></i> Actualizar', array('type' => 'submit', 'class'=>'btn-material btn-block btn-lg'))!!}
                </div>
                {!!Form::close()!!}
            </div>

            <div class="row">
                <div class="banner-marca" style="width:100%;height:250px;margin-top:-20px;overflow:hidden;">
                    @include('user.includes.banner-impulso')
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
@section('js')
<script type="text/javascript">
    $(function() {
        $("#upload_avatar").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/upload_avatar',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false
            })
            .done(function(response) {
                location.reload();
            })
            .fail(function(response) {
                response = response.responseJSON;
                $('.image-label').html(response.error);
            });
        });

        $("#avatar").change(function() {
            $('.image-label').html('');
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                $('.image-label').html("Selecciona un archivo de imagen válido");
                return false;
            } else{
                $("#upload_avatar").submit();
            }
        });
    });

    var otra = $('.global-menu').offset().top;

    $(window).on('scroll', function(){
        if ( $(window).scrollTop() > otra ){
            $('#MenuCategoria').css("display","");

        } else {
            $('#MenuCategoria').css("display","");
        }
    });
</script>
@endsection
