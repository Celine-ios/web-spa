@extends('admin.layout.index')
@section('content')

@section('styles')
{!!Html::style('/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')!!}
@endsection

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Filtros de Productos</h1>
	</section>
</div>


<div class="row controller">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			{!!Form::model($pfilter,['route'=>['admin.product_filter.update',$pfilter->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'name' => 'productForm', 'id' => 'productForm'])!!}
			<div class="x_content"></div>
			<div class="row" id="contenido_principal">

				{!!Form::hidden('id', null)!!}
				<div class="form-group">
					{!!Form::label('nombre', 'Nombre', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa una nuevo filtro de producto'])!!}
					</div>

				</div>

				<div class="form-group">
					{!!Form::label('product_subcategories_id', 'Categorías', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('product_subcategories_id[]', $pcats, null, ['class' => 'form-control categories', 'title' => 'Seleccione una Categoría de Producto', 'data-header' => 'Seleccione una Categoría de Producto', 'data-live-search' => 'true', 'multiple', 'required', 'data-size' => '5'])!!}
					</div>
				</div>

				<div class="col-sm-12">
					<div class="x_content"></div>
					{!!Form::button('Guardar', array('type' => 'submit', 'class'=>'btn btn-success btn-block btn-lg'))!!}
				</div>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>



@endsection

@section('scripts')
{!!Html::script('/vendors/ckeditor/ckeditor.js')!!}
{!!Html::script('/vendors/ckeditor/adapters/jquery.js')!!}
<script type="text/javascript">
$('select').selectpicker();
$('.categories').selectpicker('val', {{$pfilter->product_categories->pluck('id')}});
</script>
@endsection
