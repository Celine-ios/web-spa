@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Configuraciones de PC</h1>
		<h3 class="text-center">Configuraciones de PC: {{$build->titulo}}</h3>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nuevo Permiso de Usuario</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.pc_build.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-6">
					<label for="">Producto</label><br>
					{!!Form::select('product_id', $products, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un Producto', 'data-header' => 'Seleccione un Rol de Usuario', 'required'])!!}	
				</div>
				<div class="col-sm-2">
					<label for="">Cantidad</label><br>
					{!!Form::number('cantidad', 1, ['class'=>'form-control', 'min' => '1'])!!}
					{!!Form::hidden('pc_build_id', $build->id)!!}
				</div>
				<div class="col-sm-2">
					<label for="">&nbsp;</label><br>
					{!!Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Guardar', array('type' => 'submit', 'class'=>'btn btn-primary'))!!}
				</div>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de Configuraciones</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content"></div>
		<div class="row">
			<div class="col-sm-12" id="contenido_principal">
				<div id="list-loteria">
					<table class="table" role="grid" aria-describedby="datatable_info">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th>Cantidad</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($build->products as $key => $product)
							<tr>
								<td>{{$key + 1}}</td>
								<td>
									<a id="product_id" data-type="select" data-pk="{{$product->pivot->id}}" data-value="{{$product->product_id}}" data-title="Seleccione un Producto" class="editable editable-click editable-simple-select">{{$product->title}}</a>
								</td>
								<td>
									<a id="cantidad" data-type="number" data-pk="{{$product->pivot->id}}" data-title="Inserte Cantidad de Unidades Disponibles" class="editable editable-click editable-number">{{$product->pivot->cantidad}}</a>
								</td>
								<td class="alin">
									<a href="{{ route('admin.pc_build.edit', $product->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('styles')
{!!Html::style('/vendors/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')!!}
{!!Html::style('/vendors/x-editable/dist/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css')!!}
{!!Html::style('/css/select2.css')!!}
@endsection

@section('scripts')
{!!Html::script('/js/bootstrap-editable.js')!!}
{!!Html::script('/js/select2.js')!!}
{!!Html::script('/vendors/x-editable/dist/inputs-ext/typeaheadjs/lib/typeahead.js')!!}
{!!Html::script('/vendors/x-editable/dist/inputs-ext/typeaheadjs/typeaheadjs.js')!!}
<script type="text/javascript">

	$(document).ready(function() {
		$(function(){
			$.fn.editable.defaults.mode = 'inline';
			$('.editable-simple-select').editable({
				prepend: "Seleccione un Producto",
				url: "{{url('admin/build/quick')}}",
				source: "{{url('api/get_products')}}",
				showbuttons: false,
				name: $(this).attr('id'),
				params: function(params) {
					params._token = '{{csrf_token()}}';
					return params;
				},
				select2: {
					width: 200,
					placeholder: 'Select country',
					allowClear: true
				} 
			}); 

			$('.editable-number').editable({
				url: "{{url('admin/build/quick')}}",
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
		});
		
	});
</script>

@endsection