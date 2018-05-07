@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Pedidos</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de Pedidos</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content"></div>
		<div class="row">
			<div class="col-sm-12" id="contenido_principal">
				<div id="list-loteria">
					<table class="table" role="grid" aria-describedby="datatable_info">
						<thead>
							<th>ID</th>
							<th>Cliente</th>
							<th>Estado</th>
							<th>Tipo de Pago</th>
							<th>Datos de Envío</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr class="pedido_{{$order->estado}}">
								<td>{{$order->id}}</td>
								<td>{{trim($order->shipping_order->nombres).' '.trim($order->shipping_order->apellidos)}}</td>
								<td>{{ucfirst($order->estado)}}</td>
								<td>{{word_on($order->tipo_pago)}}</td>
								<td>
									@if($order->tipo_pago == 'en_linea' && in_array($order->estado, ['aprobado', 'completado']))
									<strong>Transportadora: </strong><a id="transportadora" data-type="text" data-pk="{{$order->id}}" data-title="Inserte Nombre de la Transportadora" class="editable editable-click editable-text" style="display: inline;">{{$order->online_order->transportadora}}</a><br>
									<strong>N° de Guía: </strong><a id="numero_guia" data-type="text" data-pk="{{$order->id}}" data-title="Inserte Número de la Guía" class="editable editable-click editable-text" style="display: inline;">{{$order->online_order->numero_guia}}</a><br>
									<strong>URL de Seguimiento: </strong><a id="link_seguimiento" data-type="text" data-pk="{{$order->id}}" data-title="Inserte URL de Seguimiento" class="editable editable-click editable-text" style="display: inline;">{{$order->online_order->link_seguimiento}}</a><br>
									@else
									N/A
									@endif
								</td>
								<td>
									<a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-warning view-link">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>&nbsp;
									@if($order->tipo_pago == 'contraentrega' && $order->estado == 'pendiente')
									<a href="{{ route('admin.order.approve', $order->id) }}" class="btn btn-success" onclick="return confirm('¿Desea aprobar éste pedido?');"><i class="fa fa-check" aria-hidden="true"></i></a>&nbsp;
									<a href="{{ route('admin.order.reject', $order->id) }}" class="btn btn-danger" onclick="return confirm('¿Desea rechazar éste pedido?');"><i class="fa fa-times" aria-hidden="true"></i></a>&nbsp;
									@elseif($order->tipo_pago == 'en_linea' && $order->estado == 'pendiente')
									<a href="{{ route('admin.order.test', $order->id) }}" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i></a>&nbsp;
									@endif

									@if(in_array($order->estado, ['aprobado', 'completado']))
									<a href="{{ route('admin.order.guide', $order->id) }}" class="btn btn-primary" onclick="return confirm('¿Desea generar la guía de éste registro?');"><i class="fa fa-print" aria-hidden="true"></i></a>
									@endif

									@if($order->estado == 'aprobado')
									<a href="{{ route('admin.order.send', $order->id) }}" class="btn btn-success" onclick="return confirm('¿Desea realizar el envío de éste registro?');"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="text-center">{{ $orders->links() }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('styles')
{!!Html::style('/vendors/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')!!}
<style media="screen">
	.pedido_pendiente{
		background:rgb(255,255,200);
	}

	.pedido_aprobado{
		background:rgb(165,237,222);
	}

	.pedido_completado{
		background:rgb(217,83,79);
	}

	.pedido_completado{
		background:rgb(207,207,207);
	}

	.pedido_rechazado{
		background:rgb(238,177,176);
	}
</style>
@endsection

@section('scripts')
{!!Html::script('/vendors/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js')!!}
<script type="text/javascript">
	$('.view-link').click(function(){
		$.ajax({
			url: $(this).attr('href')
		})
		.done(function(html_form) {
			$('#view-order').html(html_form);
			$('#view-order').modal('show');
		})
		.fail(function() {
			console.log("error");
		});
		return false;
	});

	$(function(){
		$.fn.editable.defaults.mode = 'inline';
		$('.editable-text').editable({
			url: "{{url('admin/order/quick')}}",
			type: 'text',
			showbuttons: false,
			name: $(this).attr('id'),
			params: function(params) {
				params._token = '{{csrf_token()}}';
				return params;
			},
			ajaxOptions: {
				dataType: 'json'
			},
			error: function(response, newValue) {
				if(response.status === 500) {
					return 'Error en la ejecución del servicio, por favor ingrese nuevamente.';
				} else {
					response = JSON.parse(response.responseText);
					response = response.error;

					if (typeof(response) === 'object') {
						respuesta = "";
						for(x in response){
							respuesta += response[x]+'\n';
						}

						return respuesta;
					} else if(typeof(response) === 'string'){
						return response;
					}
				}
			}
		});

		$('.editable-number').editable({
			url: "{{url('admin/order/quick')}}",
			type: 'number',
			showbuttons: false,
			name: $(this).attr('id'),
			params: function(params) {
				params._token = '{{csrf_token()}}';
				return params;
			},
			ajaxOptions: {
				dataType: 'json'
			},
			error: function(response, newValue) {
				if(response.status === 500) {
					return 'Error en la ejecución del servicio, por favor ingrese nuevamente.';
				} else {
					response = JSON.parse(response.responseText);
					response = response.error;

					if (typeof(response) === 'object') {
						respuesta = "";
						for(x in response){
							respuesta += response[x]+'\n';
						}

						return respuesta;
					} else if(typeof(response) === 'string'){
						return response;
					}
				}
			}
		});

		$('.editable-active').editable({
			url: "{{url('admin/order/quick')}}",
			showbuttons: false,
			name: $(this).attr('id'),
			source: [{value: 0, text: 'Inactivo'}, {value: 1, text: 'Activo'}],
			params: function(params) {
				params._token = '{{csrf_token()}}';
				return params;
			},
			display: function(value, sourceData) {
				var colors = {0: "red", 1: "blue"},
				elem = $.grep(sourceData, function(o){return o.value == value;});

				if(elem.length) {    
					$(this).text(elem[0].text).css("color", colors[value]); 
				} else {
					$(this).empty(); 
				}
			}   
		});
	});
</script>
@endsection
