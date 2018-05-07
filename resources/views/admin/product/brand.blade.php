@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Marcas</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nueva Marca</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.brand.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-5">
					<label for="">Nombre</label><br>
					{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa una nueva marca'])!!}
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
			<h2>Lista de Marcas</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content"></div>
		<div class="row">
			<div class="col-sm-12" id="contenido_principal">
				<div id="list-loteria">
					<table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($brands as $brand)
							<tr>
								{!!Form::model($brand,['route'=>['admin.brand.update', $brand->id],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
								<td>{{$brand->id}}</td>
								<td><a id="nombre" data-type="text" data-pk="{{$brand->id}}" data-title="Inserte Nombre del filtro" class="editable editable-click editable-text" style="display: inline;">{{$brand->nombre}}</a></td>
								<td class="alin">{!!Form::close()!!}&nbsp;{!!Form::open(['route'=> ['admin.brand.destroy', $brand->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $brands->links() }}
					<div class="text-center"></div>
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
	$(function(){
		$.fn.editable.defaults.mode = 'inline';
		$('.editable-text').editable({
			url: "{{url('admin/brand/quick')}}",
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
	});
</script>
@endsection