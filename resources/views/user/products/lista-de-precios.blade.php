@extends('user.layout.home')

@section('body')

<section class="blanco">
	<div class="titulo" style="display:none">

	</div>
	<div class="container">
		<div class=" col-md-10 col-md-offset-1 text-center">
			<h5>DESCARGA NUESTRA LISTA DE PRECIOS</h5>
			<h6>Ultima Actualización: {{$doc_update}}</h6>
			<p class="text-justify">La presente publicación es una guía informativa, en ningún caso constituye una propuesta comercial los precios pueden variar sin previo aviso y la mercancía esta sujeta a disponibilidad de inventario, Tauret Computadores SAS no se hace responsable por errores tipográficos o fotográficos, los precios están dados únicamente para pago en efectivo en nuestra tienda fisíca o consignacion bancaria y pueden variar por pago electrónico e impuestos donde apliquen.</p>
		</div>
		<br>
		<object data="{{$doc}}" type="application/pdf" width="100%" height="800">
			<embed src="{{$doc}}" type="application/pdf" />
		</object>
	</div>

</section>

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
