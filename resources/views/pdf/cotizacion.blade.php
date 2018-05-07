<!DOCTYPE html>
<html>
<head>
	<title>Cotizacion - Tauret Computadores</title>
</head>
<body>

<div style="width:900px; margin:70px auto;">
	<div style="float:left;width: 164px;margin-bottom: 10px;">
		<img src="{{url('images/logonegro.png')}}" width="100%">
	</div>
<div style="float: right;width: 471px;background: whitesmoke;margin-left: 20px;text-align: right;padding: 0 10px;">
<h4>Cotizacion</h4>
Bogotá, Centro Comercial Unilago<br>
Cra. 15 No 78 - 33<br> Locales 2-275 2-274 Segundo piso<br>
PBX/Tel: 6065852 /2572302<br>
Móvil: 3125229128<br>
Redes: 3197053766 <br>
ventas@tauretcomputadores.com<br>
</div>
<table id="datatable" class="table" role="grid" aria-describedby="datatable_info" style="width:100%;">
	<thead>
		<th style="width:10%; background-color:whitesmoke;">Cant</th>
		<th style="width:50%; background-color:whitesmoke;">Nombre</th>
		<th style="width:15%; background-color:whitesmoke;">Precio Unitario</th>
		<th style="width:15%; background-color:whitesmoke;">IVA (19%)</th>
		<th style="width:15%; background-color:whitesmoke;">Precio</th>
	</thead>
	<tbody>
		@foreach($build_products as $product)
		<tr>
			<td>{{$product->qty}}</td>
			<td>{{$product->name}}</td>
			<td>{{cop_format($product->price - $product->tax)}}</td>
			<td>{{cop_format($product->tax)}}</td>
			<td>{{cop_format($product->price * $product->qty)}}</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>Subtotal:</td>
			<td>{{cop_format(ceil($build_amount - $tax_build))}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>IVA (19%): </td>
			<td>{{cop_format(ceil($tax_build))}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>Total:  </td>
			<td>{{cop_format(ceil($build_amount))}}</td>
		</tr>
	</tfoot>
</table>

<div style="text-align:center;">
	Este documento no es una cotizacion formal....
</div>

</body>
</html>
