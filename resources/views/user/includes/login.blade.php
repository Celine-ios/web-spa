<!--login responsive-->
<div id="slide-out" class="side-nav">
    <!--si esta logueado-->
    @if(Auth::guard('user')->user())
        <div class="perfil-control">
            <div class="imagen-circular">
                @if(empty(Auth::guard('user')->user()->avatar))
                    {!! Html::image('/images/user-default.png')!!}
                @else
                    {!! Html::image('/images/users/'.Auth::guard('user')->user()->avatar)!!}
                @endif
            </div>
            <div class="nombre">
                {{Auth::guard('user')->user()->name}}
            </div>
            <div class="mail">
                {{Auth::guard('user')->user()->email}}
            </div>

            <ul class="menu-user">
                <li><a href="{{url('listas-de-deseo')}}">Lista de Deseos</a><span class="badge bg-user">{{$wl_count}}</span></li>
                <li><a href="{{url('user-orders')}}">Pedidos</a><span class="badge bg-user">{{$order_count}}</span></li>
                <li><a href="{{url('user-custom-pc')}}">Custom PC</a><span class="badge bg-user">{{$custom_count}}</span></li>
                <li><a href="{{url('perfil')}}">Editar perfil</a></li>
            </ul>

            {!!Form::open(['route'=>'logout', 'method'=>'POST'])!!}
            {!!Form::button('<i class="fa fa-sign-out" style="font-size:14px" aria-hidden="true"></i> Cerrar Sesión', array('type' => 'submit', 'class'=>'btn-material btn-sm', 'style' => 'margin: 14px 29%;'))!!}
            {!!Form::close()!!}
        </div>
    @else
        <!--si no esta logueado-->
        <div class="capa-login">

            <div class="botones-redes">
                <p>Ingresa con:</p>
                <div class="col-md-6">
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-primary btn-block "><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('/auth/google') }}" class="btn btn-danger btn-block "><i class="fa fa-google-plus-square" aria-hidden="true"></i> </a>
                </div>
                <br>
                <p class="o">o llene el siguiente formulario</p>
            </div>

            <div class="row">

                <div class="x_content"></div>
                {!!Form::open(['route'=>'login', 'method'=>'POST'])!!}
                {{ csrf_field() }}
                <!--nuevo username-->

                <!--fin nuevo user-->
                <div class="{{ $errors->has('username') ? ' has-error' : '' }} col-md-6 col-md-offset-3 ">
                    <div class="col-md-12">
                      <label for="username">Usuario</label>
                        {!!Form::text('username', null, ['class'=>'validate form-control'])!!}


                    </div>
                </div>


                    <div class="{{ $errors->has('password') ? ' has-error' : '' }} col-md-6 col-md-offset-3 ">
                      <div class="col-md-12">
                        <label for="password">Contraseña</label>
                        {!!Form::password('password', null, ['class'=>'validate'])!!}
                        </div>
                    </div>

                <div class="col-sm-12" id="contenido_principal">
                    <div class="x_content"></div>
                    {!!Form::button('<i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar', array('type' => 'submit', 'class'=>'btn btn-default'))!!}
                    <div style="width:100%; text-align:center">
                        ¿No tiene una cuenta?<a style="padding-left:0px" href="{{ url('/register') }}" class="registro">Regístrarse</a>
                    </div>

                </div>
                {!!Form::close()!!}
            </div>
        </div>
    @endif
</div><!--fin login-->
