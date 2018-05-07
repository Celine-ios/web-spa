@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Artículos</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <a href="{{ route('admin.article.create') }}" class="btn btn-primary col-sm-3"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Artículo</a>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Lista de Artículos</h2>
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
							<th>Categoría</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($articles as $article)
							<tr>
								<td>{{$article->id}}</td>
								<td>{{$article->titulo}}</td>
								<td>{{$article->article_types->nombre}}</td>
								<td class="alin"><a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;{!!Form::open(['route'=> ['admin.article.destroy', $article->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $articles->links() }}
					<div class="text-center"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
