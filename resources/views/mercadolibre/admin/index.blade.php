@extends('mercadolibre::layouts.master')
@section('title', 'Dashboard')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
		<p>Hola, {{ $user_data->nickname }} </p>
		<p>Id, {{ $user_data->id }} </p>
		<p>Puntos, {{ $user_data->points }} </p>
		<p>Experiencia como Vendedor, {{ $user_data->seller_experience }} </p>
	</div>
</div>
@endsection