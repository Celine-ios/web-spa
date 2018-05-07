@extends('admin.layout.index')
@section('content')

@section('styles')
{!!Html::style('/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')!!}
@endsection

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Descuentos de Productos</h1>
	</section>
</div>
<div class="row controller">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			@if(isset($disc))
			{!!Form::model($disc,['route'=>['admin.discount.update',$disc->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'name' => 'productForm', 'id' => 'productForm', 'novalidate'])!!}
			@else
			{!!Form::open(['route'=>'admin.discount.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data', 'name' => 'productForm', 'id' => 'productForm', 'novalidate'])!!}
			@endif
			<div class="x_content"></div>
			<div class="row" id="contenido_principal">
				<div class="form-group">
					{!!Form::label('nombre', 'Nombre', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo nombre de descuento'])!!}
						<span class="label label-danger">{{$errors->first('nombre') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('tipo_cupon', 'Tipo del Cupón', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('tipo_cupon', $tipo_cod, null, ['class' => 'form-control', 'title' => 'Seleccione un Tipo', 'data-header' => 'Seleccione un Tipo', 'required'])!!}
						<span class="label label-danger">{{$errors->first('tipo_cupon') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('codigo', 'Código', ['class'=>'col-sm-2 control-label'])!!}

					<div class="col-sm-1">
						<div class="checkbox">
							<label>
								{!!Form::checkbox('activar_codigo', null, false, ['class'=>'form-control', 'id' => 'activar_codigo'])!!}
								Activar
							</label>
						</div>
					</div>

					<div class="col-sm-9">
						{!!Form::text('codigo', null, ['class'=>'form-control', 'placeholder' => 'Inserte Código del Descuento', 'required', 'disabled', 'id' => 'codigo'])!!}
						<span class="label label-danger">{{$errors->first('codigo') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('discount', 'Descuento (%)', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-9">
						{!!Form::number('discount', null, ['class'=>'form-control', 'placeholder' => 'Inserte Porcentaje de Descuento', 'required', 'id' => 'descuento', 'min' => 1, 'max' => 100])!!}
						<span class="label label-danger">{{$errors->first('discount') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('asignacion', 'Asignación', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('asignacion', $asignacion, null, ['class' => 'form-control', 'title' => 'Seleccione una Asignación', 'data-header' => 'Seleccione una Asignación', 'required'])!!}
						<span class="label label-danger">{{$errors->first('asignacion') }}</span>
					</div>
				</div>

				<div class="form-group product_subcategories_id">
					{!!Form::label('product_subcategories_id', 'Categorías', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('product_subcategories_id[]', $pcats, null, ['class' => 'form-control categories', 'title' => 'Seleccione una Categoría de Producto', 'data-header' => 'Seleccione una Categoría de Producto', 'data-live-search' => 'true', 'multiple', 'required', 'data-size' => '5', 'id' => 'product_subcategories_id'])!!}
						<span class="label label-danger">{{$errors->first('product_subcategories_id') }}</span>
					</div>
				</div>

				<div class="form-group products_id">
					{!!Form::label('products_id', 'Productos', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('products_id[]', $products, null, ['class' => 'form-control products', 'title' => 'Seleccione un Producto', 'data-header' => 'Seleccione un Producto', 'data-live-search' => 'true', 'multiple', 'required', 'data-size' => '5', 'id' => 'products_id'])!!}
						<span class="label label-danger">{{$errors->first('products_id') }}</span>
					</div>
				</div>


				<div class="form-group">
					{!!Form::label('fecha_inicio', 'Fecha de Inicio', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-4">
						{!!Form::text('fecha_inicio', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Fecha de Inicio', 'readonly'])!!}
						<span class="label label-danger">{{$errors->first('fecha_inicio') }}</span>
					</div>

					{!!Form::label('fecha_fin', 'Fecha de Fin', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-4">
						{!!Form::text('fecha_fin', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Fecha de Fin', 'readonly'])!!}
						<span class="label label-danger">{{$errors->first('fecha_fin') }}</span>
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
$(document).ready(function() {
	@if(isset($disc))
	var products = {{count($disc->products)}};
	var subcategory = {{count($disc->subcategory)}};

	if (products > 0) {
		$('#asignacion').selectpicker('val', 'producto');
		$('.product_subcategories_id').hide(0);
		$('.products').selectpicker('val', {{(isset($disc)? $disc->products()->pluck('id'): "")}});
	} else if (subcategory > 0) {
		$('#asignacion').selectpicker('val', 'categoria');
		$('.product_subcategories_id').show(0);
		$('.products_id').hide(0);
		$('.categories').selectpicker('val', {{(isset($disc)? $disc->subcategory()->pluck('id'): "")}});
	} else {
		$('.product_subcategories_id').hide(0);
		$('.products_id').hide(0);
	}

	@if($disc->codigo)
	$('#activar_codigo').attr('checked', 'checked');
	$('#codigo').removeAttr('disabled');
	@endif

	@else
	$('.product_subcategories_id').hide(0);
	$('.products_id').hide(0);
	@endif
});
</script>
{!!Html::script('/js/discount.js')!!}
@endsection
