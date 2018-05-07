@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Productos</h1>
	</section>
</div>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Nuevo Producto</h2>
				<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
				<ul class="nav navbar-right panel_toolbox">
					<li>
						<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				{!!Form::open(['url'=>'admin/product/upload', 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data'])!!}
				<div class="form-group">
					<div class="col-sm-1">
						{!!Form::label('name','Insertar Varios')!!}
					</div>
					<div class="col-sm-5">
						{!!Form::file('xls_file', ['class' => 'form-control'])!!}
					</div>
					<div class="col-sm-3">
						{!!Form::button('<i class="fa fa-upload" aria-hidden="true"></i> Cargar', array('type' => 'submit', 'class'=>'btn btn-success btn-block'))!!}
					</div>
					<div class="col-sm-3">
						<a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Producto</a>
					</div>
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<div class="row">
					<div class="col-md-4">
						<h2>Lista de Productos</h2>
					</div>
					<div class="col-md-2 col-md-offset-2">
						<button type="button" class="btn btn-info pull-right hidden" id="clonar" onclick="clonar()"><i class="fa fa-clone" aria-hidden="true" ></i> Clonar <span class="numeroProductos" style="color: white;" ></span> Productos</button>
					</div>
					<div class="col-md-2">
							<button type="submit" class="btn btn-danger pull-right hidden" id="eliminar" onclick="eliminar()"> <i class="fa fa-trash" aria-hidden="true" ></i>Eliminar <span class="numeroProductos" style="color: white;"></span> Productos</button>
					</div>
					<div class="col-md-2">
						@if($active)
						<a href="{{ url('admin/inactive_product') }}" class="btn btn-warning pull-right"><i class="fa fa-times" aria-hidden="true"></i> Ver Inactivos</a>
						@else
						<a href="{{ url('admin/product') }}" class="btn btn-success pull-right"><i class="fa fa-check" aria-hidden="true"></i> Ver Activos</a>
						@endif
					</div>
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">


				<div class="row">
					<div class="col-md-8">
					{!!Form::open(['url'=> ['admin/filtro_producto'] , 'method'=>'POST', 'class'=> 'form-horizontal','id'=>'filtroProducto'])!!}
					<div class="col-md-6">
						<select id="categorias" class="form-control" onchange="buscarSubcategorias()" name="categorias">
							<option>-- Categorias --</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						<select id="subcategorias" class="form-control" name="subcategorias" onchange="enviarFiltro()">

						</select>
					</div>
					{!!Form::close()!!}
				</div>
					<div class="col-md-4">
						{!!Form::open(['url'=> ['admin/search_product'] , 'method'=>'POST', 'class'=> 'form-horizontal'])!!}
    					<div class="col-md-12 col-sm-12 col-xs-12">
    						<div class="form-group">
    							<div class="col-sm-11 ">
    								{!!Form::text('search', null, ['class'=>'form-control', 'placeholder' => 'Inserte Búsqueda'])!!}
    								{!!Form::hidden('active', $active)!!}
    							</div>
    							<div class="col-sm-1">
    								<button type="submit" class="btn btn-info" ><span class="fa fa-search" aria-hidden="true"></span></button>
    							</div>
    						</div>
    					</div>
    					{!!Form::close()!!}
					</div>

				</div>



				<table class="table table-striped table-bordered">
					<thead>
						<tr role="row">
							<th aria-sort="ascending" aria-label="Nombre: activate to sort column descending" width="4%"></th>
							<th class="sorting_asc" tabindex="0" aria-controls="datatable" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
							<th class="sorting_asc" aria-controls="datatable" aria-sort="ascending" aria-label="Nombre: activate to sort column descending" width="30%">Nombre</th>
							<th class="sorting_asc" aria-controls="datatable" aria-sort="ascending" aria-label="Marca: activate to sort column descending" width="10%">Marca</th>
							<th class="sorting_asc" aria-controls="datatable" aria-sort="ascending" aria-label="Cant.: activate to sort column descending">Cant.</th>
							<th class="sorting_asc" aria-controls="datatable" aria-sort="ascending" aria-label="Cant.: activate to sort column descending">Fecha Disponibilidad</th>
							<th class="sorting_asc" aria-controls="datatable" aria-sort="ascending" aria-label="Precio: activate to sort column descending" width="10%">Precio (IVA Incluido)</th>
							<th class="sorting_asc" aria-controls="datatable" aria-sort="ascending" aria-label="Estado: activate to sort column descending">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr role="row" class="odd">
							<td><input type="checkbox" name="multiproducts[]" class="multiproducts" onclick="multiProducts()" value="{{$product->id}}"></td>
							<td tabindex="0" class="sorting_1">{{$product->id}} </td>
							<td>
								<a id="title" data-type="text" data-pk="{{$product->id}}" data-title="Inserte Nombre del Producto" class="editable editable-click editable-text" style="display: inline;">{{$product->title}}</a><br>

								@if($active)
								Producto Destacado: <a id="product_special" data-type="select" data-pk="{{$product->id}}" data-value="{{$product->product_special}}" data-title="Producto Destacado" class="editable editable-click editable-active" style="display: inline;">{{($product->product_special ? 'Activo': 'Inactivo')}}</a>
								@endif

							</td>
							<td>
								<a id="brands_id" data-type="select" data-pk="{{$product->id}}" data-value="{{$product->brands_id}}" data-title="Seleccione una Marca" class="editable editable-click editable-simple-select" style="display: inline;">{{$product->brands->nombre}}</a>
							</td>
							<td>
								<a id="quantity" data-type="number" data-pk="{{$product->id}}" data-title="Inserte Cantidad de Unidades Disponibles" class="editable editable-click editable-number" style="display: inline;">{{$product->quantity}}</a>
							</td>
							<td>
								<a id="available_date" data-type="combodate" data-value="{{$product->available_date}}" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="{{$product->id}}" data-title="Si el producto está agotado, seleccione fecha de disponibilidad" class="editable editable-click editable-date" style="display: inline;">{{$product->available_date}}</a>
							</td>
							<td>
								<a id="price" data-type="text" data-pk="{{$product->id}}" data-title="Inserte Cantidad de Unidades Disponibles" class="editable editable-click editable-number" style="display: inline;" step="0.01">{{cop_format($product->price)}}</a><br>
								Incluir IVA: <a id="tax" data-type="select" data-pk="{{$product->id}}" data-value="{{$product->tax}}" data-title="Activar IVA 19%" class="editable editable-click editable-active" style="display: inline;">{{($product->tax ? 'Activo': 'Inactivo')}}</a>
							</td>
							<td>
								<a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

								<a href="{{ route('admin.product.fields', $product->id) }}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></a>

								<a href="{{ route('admin.product.video', $product->id) }}" class="btn btn-info"><i class="fa fa-video-camera" aria-hidden="true"></i></a>

								<a href="{{ route('admin.product.images', $product->id) }}" class="btn btn-info"><i class="fa fa-photo" aria-hidden="true"></i></a>

								<a href="{{ route('admin.product.deactivate', $product->id) }}" class="btn {{($product->published ? 'btn-warning': 'btn-success')}}" onclick="{{($product->published ? 'return confirm(\'¿Desea desactivar éste registro?\');': 'return confirm(\'¿Desea activar éste registro?\');')}}">
									<i class="fa {{($product->published ? 'fa-times': 'fa-check')}}" aria-hidden="true"></i>
								</a>&nbsp;{!!Form::open(['route'=> ['admin.product.destroy', $product->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}<button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar éste registro?');"><span class="fa fa-trash" aria-hidden="true"></span></button>{!!Form::close()!!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('styles')
{!!Html::style('/vendors/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')!!}
@endsection

@section('scripts')
{!!Html::script('/js/bootstrap-editable.js')!!}
<script type="text/javascript">

	function multiProducts()
	{
		var count = $(":checkbox.multiproducts:checked").length;
		if(count>=1)
		{
			$("#clonar").removeClass('hidden');
			$("#eliminar").removeClass('hidden');
			$(".numeroProductos").text(count);
		}
		else
		{
			$("#clonar").addClass('hidden');
			$("#eliminar").addClass('hidden');
		}
		

	}

	function clonar()
	{
		var val = $(":checkbox.multiproducts:checked").val();
		var ids = [];

		$("input[type=checkbox]:checked").each(function()
		{
			//cada elemento seleccionado
			ids.push($(this).val());
		});

		var token = $("#token").val();
	    var route="/admin/cloneproducts";

		$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{ids},
    	complete: function(transport)
    	{	
    		location.reload()
	    }
		});

	}

	function eliminar()
	{
		var val = $(":checkbox.multiproducts:checked").val();
		var ids = [];

		$("input[type=checkbox]:checked").each(function()
		{
			//cada elemento seleccionado
			ids.push($(this).val());
		});

		var token = $("#token").val();
	    var route="/admin/deleteproducts";

		$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{ids},
    	complete: function(transport)
    	{	
    		location.reload()
	    }
		});

	}


	function enviarFiltro()
	{
		$("#filtroProducto").submit();
	}
	function buscarSubcategorias()
	{
		var categoria = $('#categorias').val();
	    var token = $("#token").val();
	    var route="/admin/subcategories";

	    	$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data:{categoria},
	    	complete: function(transport)
	    	{
	    		data = transport.responseJSON;
	            $("#subcategorias").empty();
	            new_tags = $('#subcategorias').val();
	            if (!new_tags) {
	                new_tags = [];
	            }
	            $("#subcategorias").append('<option value="seleccione">Seleccione</option>').selectpicker('refresh');
	            for (x in data) {
	                if ($('#subcategorias').find('[value='+data[x].id+']').length == 0)
	                {
	                    $("#subcategorias").append('<option value="'+data[x].slug+'">'+data[x].nombre+'</option>').selectpicker('refresh');
	                }
	                new_tags.push(data[x].id);
	            }
		    }
		  });
	}
	$(function(){
		$.fn.editable.defaults.mode = 'inline';
		$('.editable-text').editable({
			url: "{{url('admin/product/quick')}}",
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

		$('.editable-simple-select').editable({
			prepend: "Seleccione una Marca",
			url: "{{url('admin/product/quick')}}",
			source: "{{url('api/get_brands')}}",
			showbuttons: false,
			name: $(this).attr('id'),
			allowClear: true,
			params: function(params) {
				params._token = '{{csrf_token()}}';
				return params;
			}
		});

		$('.editable-number').editable({
			url: "{{url('admin/product/quick')}}",
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
			url: "{{url('admin/product/quick')}}",
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

		$('.editable-date').editable({
			url: "{{url('admin/product/quick')}}",
			mode: 'popup',
			name: $(this).attr('id'),
			params: function(params) {
				params._token = '{{csrf_token()}}';
				return params;
			},
			maxYear: 2017,
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
</script>
@endsection
