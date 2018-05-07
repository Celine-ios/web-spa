<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="{{url('/images/icono.png')}}"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Exala Reckless Pro | Administración</title>
	<meta name="twitter:" content="">
	<meta name="facebook" content="">
	<meta name="keywords" content="palabras clave, @yield('keywords')">
	@yield('meta')
	@include('admin.includes.style')
	@yield('styles')
</head>
<body class="nav-md" ng-app="exala">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed" >
				<div class="left_col scroll-view">
					<div class="profile">
						<div class="profile_pic">
							<a href="{{url('admin')}}"><img src="{{asset('/images/icono.png')}}" class="img-circle profile_img"></a>

						</div>
						<div class="profile_info">
							<span>Bienvenido(a),</span>
							<h2>{{Auth::guard('admin')->user()->name}}</h2>
						</div>
					</div>

					<br />
					@include('admin.includes.menu')
					@include('admin.includes.menutop')
					<div class="right_col" role="main">
						@include('alerts.messages')
						@yield('content')
						<br>
						<div class="footlo"><p>By Exala Innovacion Digital S.A.S. | <i class="fa fa-copyright" aria-hidden="true"></i> 2017</p></div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="view-order" role="dialog"></div>

	@include('admin.includes.script')
	{!!Html::script('/js/exala.js')!!}

	@yield('scripts')

	<script type="text/javascript">
		var config = {
			apiKey: "AIzaSyAmjPbTrTc_ghBV4BZqn0jKGRi_oVDIHJI",
			authDomain: "tauret-computadores.firebaseapp.com",
			databaseURL: "https://tauret-computadores.firebaseio.com",
			projectId: "tauret-computadores",
			storageBucket: "tauret-computadores.appspot.com",
			messagingSenderId: "172872949320"
		};
		firebase.initializeApp(config);

		const messaging = firebase.messaging();
		messaging.requestPermission()
		.then(function() {
			return messaging.getToken();
		})
		.then(function(token) {
			$.ajax({
				url: '{{url("api/prueba_push")}}',
				type: 'POST',
				dataType: 'json',
				data: {
					_token: '{{csrf_token()}}',
					token: token,
					user_type: 'admin'
				},
			});
		})
		.catch(function(err) {
			console.log(err.message);
		});

		messaging.onMessage(function(payload) {
			Push.create(payload.notification.title, {
				body: payload.notification.body,
				icon: "{{url('images/icono.png')}}",
				timeout: 6000,
				onClick: function () {
					window.focus();
					this.close();
					window.location.href=payload.notification.click_action;
				}
			});
		});
	</script>
</body>
</html>
