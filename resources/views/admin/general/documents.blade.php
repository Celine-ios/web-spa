@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Documentos</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de Tipos de Documento</h2>
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
							<th>Documentos Existentes</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($btypes as $btype)
							<tr>
								<td>{{$btype->id}}</td>
								<td>{{$btype->nombre}}</td>
								<td>{{$btype->descripcion}}</td>
								<td>{{$btype->docs->count()}}</td>
								<td class="alin">
									<a href="{{ route('admin.document.edit', $btype->id) }}" class="btn btn-warning">
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