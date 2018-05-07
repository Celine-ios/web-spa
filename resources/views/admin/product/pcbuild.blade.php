@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Configuraciones de PC</h1>
	</section>
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
							<th>Usuario</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($builds as $brand)
							<tr>
								<td>{{$brand->id}}</td>
								<td>{{$brand->titulo}}</td>
								<td>
									<a href="{{ route('admin.client.view', $brand->user->id) }}" class="view-link">
										{{$brand->user->first_name}} {{$brand->user->last_name}}
									</a>
								</td>
								<td class="alin">
									<a href="{{ route('admin.pc_build.edit', $brand->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="text-center">
						{{ $builds->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
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
</script>
@endsection

