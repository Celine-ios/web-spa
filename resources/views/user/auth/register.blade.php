@extends('user.layout.auth')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Registro</h4>
                </div>
                <div class="panel-body capa-login">
                    @if(null === old('social') )
                    <div class="col-md-8 col-md-offset-2 text-center">
                        Puede registrarse con:
                    </div>
                    <div class="col-md-8 col-md-offset-2 col-sm-12">
                        <br>

                        <br>
                        <div class="botones-redes">

                            <div class="btn-social">
                                <a href="{{ url('/auth/facebook') }}" class="btn-material btn-block btn-lg indigo"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a>
                            </div>
                            <div class="btn-social">
                                <a href="{{ url('/auth/google') }}" class="btn-material btn-block btn-lg red darken-2"><i class="fa fa-google-plus-square" aria-hidden="true"></i> Google</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(null === old('social') )
                    <div class="col-md-8 col-md-offset-2 text-center">
                        Llene el siguiente formulario:
                    </div>
                    @else
                        <div class="col-md-8 col-md-offset-2 text-center">
                            Llene el siguiente formulario sólo por esta vez:
                        </div>
                    @endif
                    <div class="row">
                        <div class="x_content"></div>
                        {!!Form::open(['route'=>'register', 'method'=>'POST', 'id' => 'contact-form', 'name' => 'contact-form', 'novalidate'])!!}


                        <div class=" input-field col-md-6 col-sm-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                             {!!Form::text('first_name', null, ['class'=>'form-control text-center', 'required'])!!}
                             {!!Form::label('first_name', 'Nombres', ['class'=>' control-label'])!!}
                             <span class="label label-danger">{{$errors->first('first_name') }}</span>
                        </div>

                        <div class="input-field col-md-6 col-sm-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                {!!Form::text('last_name', null, ['class'=>'form-control text-center', 'required'])!!}
                                {!!Form::label('last_name', 'Apellidos', ['class'=>' control-label'])!!}
                                <span class="label label-danger">{{$errors->first('last_name') }}</span>
                        </div>
                        <div class=" input-field col-md-6 col-sm-12 {{ $errors->has('username') ? ' has-error' : '' }}">

                                {!!Form::text('username', null, ['class'=>'form-control text-center', 'required'])!!}
                                {!!Form::label('username', 'Nombre de Usuario', ['class'=>' control-label'])!!}
                                <span class="label label-danger">{{$errors->first('username') }}</span>

                        </div>
                        <div class=" input-field col-md-6 col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">

                                {!!Form::email('email', null, ['class'=>'form-control text-center', 'required'])!!}
                                {!!Form::label('email', 'Correo Electrónico', ['class'=>' control-label'])!!}
                                <span class="label label-danger">{{$errors->first('email') }}</span>

                        </div>
                        <div class=" input-field col-md-6 col-sm-12 {{ $errors->has('birthday') ? ' has-error' : '' }}">

                                {!!Form::date('birthday', date('Y-m-d'), ['class'=>'form-control text-center', 'max' => date('Y-m-d'), 'required'])!!}

                                <span class="label label-danger">{{$errors->first('birthday') }}</span>
                          
                        </div>
                        <div class="input-field col-md-6 col-sm-12 {{ $errors->has('city') ? ' has-error' : '' }}">

                                {!!Form::text('city', null, ['class'=>'form-control', 'required', 'id' => 'city'])!!}

                                <span class="label label-danger">{{$errors->first('city') }}</span>

                        </div>
                        <div class=" input-field col-md-6 col-sm-12 {{ $errors->has('password') ? ' has-error' : '' }}">

                                {!!Form::password('password', null, ['class'=>'form-control text-center', 'required'])!!}

                                {!!Form::label('password', 'Contraseña', ['class'=>' control-label'])!!}
                                <span class="label label-danger">{{$errors->first('password') }}</span>

                        </div>
                        <div class="input-field col-md-6 col-sm-12 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                {!!Form::password('password_confirmation', null, ['class'=>'form-control text-center', 'required'])!!}

                                {!!Form::label('password_confirmation', 'Confirma tu Contraseña', ['class'=>' control-label'])!!}
                                <span class="label label-danger">{{$errors->first('password_confirmation') }}</span>
                        </div>

                        <div class="col-sm-12">
                            {!!Form::checkbox('terms', null, true, ['id' => 'terms', 'required'])!!}
                            <label for="terms">
                                <a href="{{url('terminos')}}" target="_blank">Por favor lea y acepte los términos de servicio.</a>
                            </label>
                            <span class="label label-danger">{{$errors->first('terms') }}</span>
                        </div>

                        <div class="col-sm-4 col-md-offset-4" id="contenido_principal">
                            <div class="x_content"></div>
                            {!!Form::hidden('provider_user_id', null, ['class'=>'form-control'])!!}
                            {!!Form::hidden('avatar', null, ['class'=>'form-control'])!!}
                            {!!Form::hidden('social', null, ['class'=>'form-control'])!!}
                            {!!Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i> Regístrarse', array('type' => 'submit', 'class'=>'btn-material btn-block btn-lg'))!!}
                            ¿Ya tiene una cuenta?<br> <a href="{{ url('/login') }}"> Inicia Sesión</a>

                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
{{Html::script('https://apis.google.com/js/api:client.js')}}
{{Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfgqIoM2rtSqfTQIEpugy6t3qJBD07vI&libraries=places&callback=initAutocomplete', ['async','defer'])}}
<script type="text/javascript">
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('city')), {
                types: ['(cities)'], componentRestrictions: {'country': 'co'}
            });
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();
        for (x in place.address_components) {
            tipo = place.address_components[x].types[0];
            if (tipo == 'route') {
                val = place.address_components[x].long_name;
                document.getElementById('address_2').value = val;
            } else if (tipo == 'administrative_area_level_1') {
                val = ''
                for (y in place.address_components) {
                    if (place.address_components[y].types[0] == 'administrative_area_level_2') {
                        val = place.address_components[y].long_name+', ';
                    }
                }
                val += place.address_components[x].long_name;
                $('#city').val(val);
            }
        }
    }

</script>
@endsection
