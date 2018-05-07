@extends('admin.layout.index')
@section('content')

@section('styles')
{!!Html::style('/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')!!}
<link rel="stylesheet" type="text/css" href="{{asset('vendors/multiple-select-master/multiple-select.css')}}">
@endsection

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Subcategorías de Productos</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nueva Subcategoría de Producto</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.product_subcategory.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-3">
					<label for="">Nombre</label><br>
					{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa una nueva subcategoría de producto'])!!}
				</div>
				<div class="col-sm-3">
					<label for="">Categoria</label><br>
					{!!Form::select('product_categories_id', $cats, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Categoría Padre'])!!}
				</div>
				<div class="col-sm-4">
					<label for="">Caracteristicas</label><br>
					{!!Form::select('category[]', $categoryCaracteristics, null, ['class' => ' select', 'title' => 'Seleccione las categorias de caracteristicas', 'data-header' => 'Seleccione las categorias de caracteristicas', 'data-live-search' => 'true', 'multiple','required', 'id' => 'category','required'=>'required'])!!}
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
			<h2>Lista de Categorías de Productos</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content"></div>
		<div class="row">
			<div class="col-sm-12" id="contenido_principal">
				<div id="list-loteria">
					<table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
						<thead>
							<th>Nombre</th>
							<th>Categoría</th>
							<th>Caracteristicas</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($pcats as $pcat)

							<tr>
								{!!Form::model($pcat,['url'=>['admin/updatesubcategory', $pcat->id],'method'=>'POST', 'class'=> 'form-horizontal'])!!}
								<td>{!!Form::text('nombre', $pcat->nombre, ['class'=>'form-control'])!!}</td>
								<td>{!!Form::select('product_categories_id', $cats, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Categoría Padre','required'])!!}</td>
								<td>

									<select  name="categoryCaracteristics[]" id="{{$pcat->id}}" class=" select" title="Seleccione las categorias de caracteristicas" data-header="Seleccione las categorias de caracteristicas" data-live-search="true" multiple required="required">
										@foreach($categoryCaracteristics as $id => $category)
											<option value="{{$id}}" @foreach($pcat->categoryCaracteristics as $categorySelected) @if($categorySelected->id_caracteristic_category ==$id) selected @endif @endforeach>{{$category}}</option>
										@endforeach
									
									</select>

								</td>
								<td class="alin">{!!Form::button('<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-primary	','onclick' => 'alert($("#$pcat->id").val());'))!!}{!!Form::close()!!}&nbsp;{!!Form::open(['route'=> ['admin.product_subcategory.destroy', $pcat->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
							</tr>
							</form>
							@endforeach
						</tbody>
					</table>
					{{ $pcats->links() }}
					<div class="text-center"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
{!!Html::script('/vendors/ckeditor/ckeditor.js')!!}
{!!Html::script('/vendors/ckeditor/adapters/jquery.js')!!}
<script src="{{asset('vendors/multiple-select-master/multiple-select.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
     $('.select').multipleSelect();
    });
</script>
@endsection