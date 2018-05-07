<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>{{config('app.name')}} | {{$product->title}}</title>
    <link rel="shortcut icon" type="image/png" href="{{url('/images/icono.png')}}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	{!!Html::style('/vendors/bootstrap/dist/css/bootstrap.min.css')!!}
	@if(file_exists(url('/css/'.$product->slug.'.css')))
	{!!Html::style(url('/css/'.$product->slug.'.css'))!!}
	@endif
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div id="logo">
					{!! Html::image('/images/logonegro.svg')!!}
				</div>
			</div>
			<div class="col-md-3 col-md-offset-6">
				<a href="{{ url('/') }}" class="btn btn-primary">Volver a Tauret</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<ul>
					@foreach($product->images as $image)
					<li>{{url('images/products/'.$image->link_imagen)}}</li>
					@endforeach	
				</ul>
				
			</div>
			<div class="col-md-6">
				<h2>{{$product->title}}</h2>
				<h3>{!!$product->subtitle!!}</h3>
			</div>
		</div>

		<div class="row">
			<div id="exTab1" class="container">	
				<ul  class="nav nav-pills">
					<li class="active">
						<a href="#description" data-toggle="tab">Descripción</a>
					</li>
					<li>
						<a href="#specifications" data-toggle="tab">Especificaciones</a>
					</li>
					@foreach($product->additional as $additional)
					<li>
						<a href="#{{$additional->slug}}" data-toggle="tab">{{$additional->title}}</a>
					</li>
					@endforeach
				</ul>

				<div class="tab-content clearfix">
					<div class="tab-pane active" id="description">
						{!!$product->description!!}
					</div>
					<div class="tab-pane" id="specifications">
						{!!$product->specifications!!}
					</div>
					@foreach($product->additional as $additional)
					<div class="tab-pane" id="{{$additional->slug}}">
						{!!$additional->content!!}
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	{!!Html::script('/vendors/jquery/dist/jquery.min.js')!!}
	{!!Html::script('/vendors/bootstrap/dist/js/bootstrap.min.js')!!}
</body>
</html>	