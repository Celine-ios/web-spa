@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Descuentos</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nuevo Descuento</h2><br></div>
		<div class="x_content">
			<div class="form-group">
				<div class="col-sm-3">
					<a href="{{ route('admin.discount.create') }}" class="btn btn-primary btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Descuento</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12" id="contenido_principal">
			<div id="list-loteria">
				<table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Tipo del Cupón</th>
						<th>Porcentaje de Descuento</th>
						<th>Código</th>
						<th>Fecha de Inicio</th>
						<th>Fecha de Fin</th>
						<th>Asociados</th>
						<th></th>
					</thead>
					<tbody>
						@foreach($discounts as $discount)
						<tr>
							{!!Form::model($discount,['route'=>['admin.discount.update',$discount->id],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
							<td>{{$discount->id}}</td>
							<td>{{$discount->nombre}}</td>
							<td>{{ucfirst($discount->tipo_cupon)}}</td>
							<td>{{$discount->discount}}%</td>
							<td>{{($discount->activar_codigo ? $discount->codigo: 'Inactivo')}}</td>
							<td>{{$discount->fecha_inicio}}</td>
							<td>{{$discount->fecha_fin}}</td>
							<td>
								@if(count($discount->subcategory) > 0)
								<strong>CATEGORÍAS:</strong>
								<ul>
									@foreach ($discount->subcategory as $category)
									<li>{{$category->nombre}}</li>
									@endforeach
								</ul>
								@else
								<strong>PRODUCTOS:</strong>
								<ul>
									@foreach ($discount->products as $products)
									<li>{{$products->title}}</li>
									@endforeach
								</ul>
								@endif
							</td>
							<td><a href="{{ route('admin.discount.edit', $discount->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;{!!Form::open(['route'=> ['admin.discount.destroy', $discount->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}<button type="submit" class="btn {{($discount->estado ? 'btn-danger': 'btn-success')}}" onclick="{{($discount->estado ? 'return confirm(\'¿Desea eliminar éste registro?\');': 'return confirm(\'¿Desea activar éste registro?\');')}}"><span class="glyphicon  {{($discount->estado ? 'glyphicon-remove': 'glyphicon-ok')}}" aria-hidden="true"></span></button>{!!Form::close()!!}</td>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $discounts->links() }}
			</div>
		</div>
	</div>
</div>
</div>

@endsection
