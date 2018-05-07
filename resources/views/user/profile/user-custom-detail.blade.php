@extends('user.layout.home')

@section('body')

<div class="container">
	<div class="col-md-8">
		<h4>Tus Configuraciones:</h4>
		<div class="titulo" style="display:none">

  </div>
		<!--estados como los de ts y redes que cambie dependiendo el estado-->
		<div class="table-responsive tabla-deseos">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th class="text-center" style="width:5%">Cantidad</th>
						<th class="text-center" style="width:45%">Producto</th>
						<th class="text-center" style="width:15%">Precio Unitario</th>
						<th class="text-center" style="width:15%">IVA 19%</th>
						<th class="text-center" style="width:15%">Precio</th>
						<th class="text-center" style="width:15%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($pc_builds as $product)
					<tr>
						<td>{{$product->pivot->cantidad}}</td>
						<td>{{$product->title}}</td>
						<td>{{cop_format(ceil($product->price - $product->tax))}}</td>
						<td>{{cop_format(ceil($product->tax))}}</td>
						<td>{{cop_format(ceil($product->price * $product->pivot->cantidad))}}</td>
						<td style="padding-top:0 !important">
							{!!Form::open(['route'=>['remove_build', $id],'method'=>'POST'])!!}
							{!!Form::hidden('id', $product->pivot->id)!!}
							<button type="submit" class="btn btn-danger btn-xs pull-left" onclick="return confirm('¿Desea remover de la Configuración de tu PC?');"><i class="fa fa-close"></i> Remover</button>
							{!!Form::close()!!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<ul class="collection">
				<li class="collection-item total">
					<h5>Total (IVA incluido):  <span class="label total pull-right">{{cop_format($build_amount)}}</span></h5>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				{!!Form::open(['route'=> ['remove_build', $id],'method'=>'POST'])!!}
				{!!Form::hidden('id', 'all')!!}
				<button type="submit" class="btn btn-danger btn-block btn-lg" onclick="return confirm('¿Desea borrar la Configuración de su PC?');"><i class="fa fa-close"></i> Remover Todo</button>
				{!!Form::close()!!}
			</div>
			<div class="col-md-4">
				{!!Form::open(['route'=> ['build_cart', $id], 'method'=>'POST'])!!}
				<button type="submit" class="btn btn-tauret btn-block btn-lg" onclick="return confirm('¿Desea comprar ésta Configuración de su PC?');"><i class="fa fa-shopping-cart"></i> Comprar</button>
				{!!Form::close()!!}
			</div>
		</div>
		@include('user.profile.product-relacionado')
	</div>


	<div class="col-md-4 text-center">
		@include('user.profile.card-profile')
		<div class="banner-patrocinado">
			@include('user.includes.banner-impulso')
		</div>
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript">
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