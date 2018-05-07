<div class="row profile" >
    <div class="profile-sidebar" style="background-color:whitesmoke">
        <!-- SIDEBAR USERPIC -->
        <div class="imagen-circular">
            @if(empty(Auth::guard('user')->user()->avatar))
            {!! Html::image('/images/user-default.png')!!}
            @else
            {!! Html::image('/images/users/'.Auth::guard('user')->user()->avatar)!!}
            @endif
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                {{Auth::guard('user')->user()->name}}
            </div>
            <div class="profile-usertitle-job">
                {{Auth::guard('user')->user()->email}}
            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            @foreach(Auth::guard('user')->user()->social as $account)
            @if($account->provider == 'facebook')
            <a href="{{url('https://www.facebook.com/'.$account->provider_user_id)}}" class="btn btn-primary" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
            @elseif($account->provider == 'google')
            <a href="{{url('https://plus.google.com/'.$account->provider_user_id)}}" class="btn btn-danger" target="_blank"><i class="fa fa-google-plus"></i> Google</a>
            @endif
            @endforeach
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="{{(Request::is('listas-de-deseo') ? 'active': '')}}"><a href="{{url('listas-de-deseo')}}">Lista de Deseos</a><span class="badge bg-user">{{$wish_list->count()}}</span></li>
                <li class="{{(Request::is('user-orders') ? 'active': '')}}"><a href="{{url('user-orders')}}">Pedidos</a></li>
                <li class="{{(Request::is('user-custom-pc') ? 'active': '')}}"><a href="{{url('user-custom-pc')}}">Custom PC</a></li>
                <li class="{{(Request::is('perfil') ? 'active': '')}}"><a href="{{url('perfil')}}">Editar perfil</a></li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>
