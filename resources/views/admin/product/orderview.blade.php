<!-- Modal content-->
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Orden N° {{$order->id}}</h4>
			<small>Creada el día: {{$order->created_at}}</small>
		</div>
		<div class="modal-body">
			<h4>Cliente</h4>
			<table class="table">
				<tr>
					<th>N° de Identificación: </th>
					<td>{{$order->shipping_order->dni}}</td>
				</tr>
				<tr>
					<th>Nombre: </th>
					<td>{{$order->shipping_order->nombres.' '.$order->shipping_order->apellidos}}</td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td>{{$order->shipping_order->email}}</td>
				</tr>
				<tr>
					<th>Teléfono: </th>
					<td>{{$order->shipping_order->telefono}}  {{($order->shipping_order->telefono_2 ? '-'.$order->shipping_order->telefono_2 : '')}}</td>
				</tr>
				<tr>
					<th>Dirección: </th>
					<td>{{$order->shipping_order->direccion}}  {{($order->shipping_order->direccion_2 ? '-'.$order->shipping_order->direccion_2 : '')}}</td>
				</tr>
				<tr>
					<th>Ciudad: </th>
					<td>{{$order->shipping_order->ciudad}}</td>
				</tr>
			</table>
			<h4>Productos</h4>
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Unidades</th>
					<th>Precio Unitario</th>
					<th>Precio Total</th>
				</tr>

				@foreach($order->products as $order_line)
				<tr>
					<td>{{$order_line->id}}</td>
					<td>{{$order_line->title}}</td>
					<td>{{$order_line->pivot->units}}</td>
					<td>{{cop_format($order_line->pivot->unit_price)}}</td>
					<td>{{cop_format($order_line->pivot->unit_price * $order_line->pivot->units)}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		<div class="modal-footer">
			@if($order->tipo_pago == 'contraentrega' && $order->estado == 'pendiente')
			{!!link_to_route('admin.order.approve', 'Aprobar', [$order->id], ['class'=>'btn btn-success', 'onclick' => 'return confirm("¿Desea aprobar ésta Orden de Compra?");'])!!}
			{!!link_to_route('admin.order.reject', 'Rechazar', [$order->id], ['class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea rechazar ésta Orden de Compra?");'])!!}
			@elseif($order->tipo_pago == 'en_linea' && $order->estado == 'pendiente')
			{!!link_to_route('admin.order.test', 'Comprobar', [$order->id], ['class'=>'btn btn-info'])!!}
			@elseif($order->estado == 'aprobado')
			{!!link_to_route('admin.order.guide', 'Orden de Compra', [$order->id], ['class'=>'btn btn-primary', 'onclick' => 'return confirm("¿Desea generar ésta Orden de Compra?");'])!!}
			{!!link_to_route('admin.order.send', 'Enviar', [$order->id], ['class'=>'btn btn-success', 'onclick' => 'return confirm("¿Desea realizar el envío de éste registro?");'])!!}
			@endif
		</div>
	</div>
</div>
