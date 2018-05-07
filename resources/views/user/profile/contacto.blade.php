@extends('user.layout.home')

@section('body')

<section id="contacto">
	<div class="titulo" style="display:none">

	</div>
	<div class="container">
		<h1 class="text-center">Contacto</h1>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">

				{!!Form::open(['route'=>'contacto', 'method'=>'POST', 'id' => 'contact-form', 'name' => 'contact-form', 'novalidate'])!!}

				<div class="form-group select {{ $errors->has('tipo-persona') ? ' has-error' : '' }} col-sm-12">
					<div class="col-sm-6 col-sm-offset-3">
						{!!Form::select('tipo-persona', [null => 'Seleciona el tipo de contacto', 'natural' => 'Persona Natural', 'juridica' => 'Persona Jurídica'], (isset($producto) ? 'natural' : null), ['class' => 'browser-default form-control', 'id' => 'tipo-persona', 'required', 'style' => 'border:solid 1px whitesmoke;border-radius:6px;'])!!}
					</div>

					<span class="label label-danger">{{$errors->first('tipo-persona') }}</span>
				</div>

				<div class="form-group {{ $errors->has('razon') ? ' has-error' : '' }} juridica col-sm-12">
					<label for="razon" class="col-sm-2 control-label">Razón Social</label>
					<div class="col-sm-10">
						{!!Form::text('razon', null, ['class'=>'form-control', 'placeholder' => 'Inserte Nombre de la Empresa', 'required'])!!}
						<span class="label label-danger">{{$errors->first('razon') }}</span>
					</div>
				</div>

				<div class="form-group {{ $errors->has('nit') ? ' has-error' : '' }} juridica col-sm-12">
					<label for="nit" class="col-sm-2 control-label">NIT</label>
					<div class="col-sm-10">
						{!!Form::text('nit', null, ['class'=>'form-control', 'placeholder' => 'Inserte NIT de la Empresa', 'required'])!!}
						<span class="label label-danger">{{$errors->first('nit') }}</span>
					</div>
				</div>

				<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-sm-12">
					<label for="name" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						{!!Form::text('name', (Auth::guard('user')->user() ? Auth::guard('user')->user()->first_name.' '.Auth::guard('user')->user()->last_name : null ), ['class'=>'form-control', 'placeholder' => 'Inserte Nombre y Apellido', 'required'])!!}
						<span class="label label-danger">{{$errors->first('name') }}</span>
					</div>
				</div>

				<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-sm-12">
					<label for="email" class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-10">
						{!!Form::email('email', (Auth::guard('user')->user() ? Auth::guard('user')->user()->email : null ), ['class'=>'form-control', 'placeholder' => 'tucorreo@ejemplo.com', 'required'])!!}
						<span class="label label-danger">{{$errors->first('email') }}</span>
					</div>
				</div>

				<div class="form-group {{ $errors->has('telefono') ? ' has-error' : '' }} col-sm-12">
					<label for="telefono" class="col-sm-2 control-label">Teléfono</label>
					<div class="col-sm-10">
						{!!Form::number('telefono', null, ['class'=>'form-control', 'placeholder' => 'Inserte Teléfono Fijo. Fax o Móvil', 'required', 'min' => '1'])!!}
						<span class="label label-danger">{{$errors->first('telefono') }}</span>
					</div>
				</div>

				<div class="form-group {{ $errors->has('ciudad') ? ' has-error' : '' }} col-sm-12">
					<label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
					<div class="col-sm-10">
						{!!Form::text('ciudad', (Auth::guard('user')->user() ? Auth::guard('user')->user()->city : null ), ['class'=>'form-control', 'placeholder' => 'Inserte Ciudad', 'required', 'id' => 'city'])!!}
						<span class="label label-danger">{{$errors->first('ciudad') }}</span>
					</div>
				</div>

				<div class="form-group {{ $errors->has('mensaje') ? ' has-error' : '' }} col-sm-12">
					<label for="mensaje" class="col-sm-2 control-label">Mensaje</label>
					<div class="col-sm-10">
						{!!Form::textarea('mensaje', (isset($producto) ? 'Me gustaría saber más sobre el producto '.$producto : null ), ['class'=>'form-control', 'placeholder' => 'Inserte su Mensaje', 'required', 'style' => 'border:solid 1px whitesmoke;border-radius:6px;'])!!}
						<span class="label label-danger">{{$errors->first('mensaje') }}</span>
					</div>
				</div>

				<div class="form-group col-md-3 col-md-offset-9">
					{!!Form::button('Enviar', ['type' => 'submit', 'class'=>'btn btn-tauret btn-block btn-lg'])!!}
				</div>
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('js')
{{Html::script('/js/forms.js')}}
{{Html::script('https://apis.google.com/js/api:client.js')}}
{{Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfgqIoM2rtSqfTQIEpugy6t3qJBD07vI&libraries=places&callback=initAutocomplete', ['async','defer'])}}
<script type="text/javascript">
	$(document).ready(function($) {
		tipo_persona = $('#tipo-persona').val();
		switch(tipo_persona) {
			case 'natural':
			$('#contact-form .form-group').not('.juridica, .select').show('fast');
			$('#contact-form .juridica').hide('fast');
			break;
			case 'juridica':
			$('#contact-form .form-group').not('.select').show('fast');
			break;

			default:
			$('#contact-form .form-group').not('.select').hide('fast');
			break;
		}
	});

	var otra = $('.global-menu').offset().top;

	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > otra ){
			$('#MenuCategoria').css("display","");

		} else {
			$('#MenuCategoria').css("display","");
		}
	});

	$('#contact-form .form-group').not('.select').hide('fast');
	$('#tipo-persona').change(function() {
		tipo_persona = $('#tipo-persona').val();
		switch(tipo_persona) {
			case 'natural':
			$('#contact-form .form-group').not('.juridica, .select').show('fast');
			$('#contact-form .juridica').hide('fast');
			break;
			case 'juridica':
			$('#contact-form .form-group').not('.select').show('fast');
			break;

			default:
			$('#contact-form .form-group').not('.select').hide('fast');
			break;
		}
	});

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

	$("#contact-form").validate();
</script>
@endsection
