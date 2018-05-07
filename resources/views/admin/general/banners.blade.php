@extends('admin.layout.index')
@section('content')


<section class="content-header">
	<h1 class="text-center">Administración de Banners</h1>
</section>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de Tipos de Banner</h2>
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
							<th>Descripción</th>
							<th>Banners Existentes</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($btypes as $btype)
							<tr>
								<td>{{$btype->id}}</td>
								<td>{{$btype->nombre}}</td>
								<td>{{$btype->descripcion}}</td>
								<td>{{$btype->banners->count()}}</td>
								<td class="alin">
									<a href="{{ route('admin.banner.edit', $btype->id) }}" class="btn btn-warning">
										<i class="fa fa-picture-o" aria-hidden="true"></i>
									</a>&nbsp;
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<div class="text-center">
						{{$btypes->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection