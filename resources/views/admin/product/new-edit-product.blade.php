@extends('admin.layout.index')
@section('content')

@section('styles')
{!!Html::style('/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')!!}
@endsection

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Productos</h1>
	</section>
</div>


<div class="row controller">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			@if(isset($product))
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3">
							<a href="{{url('/admin/product')}}" class="btn btn-warning btn-lg btn-block"><i class="fa fa-backward" aria-hidden="true"></i> Volver</a>
						</div>
						<div class="col-sm-3">
							<a href="{{route('admin.product.fields', $product->id)}}" class="btn btn-default btn-lg btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Campos Adicionales</a>
						</div>
						<div class="col-sm-3">
							<a href="{{route('admin.product.video', $product->id)}}" class="btn btn-info btn-lg btn-block"><i class="fa fa-video-camera" aria-hidden="true"></i> Vídeos</a>
						</div>
						<div class="col-sm-3">
							<a href="{{route('admin.product.images', $product->id)}}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-photo" aria-hidden="true"></i> Imágenes</a>
						</div>
					</div>

				</div>
			</div>
			{!!Form::model($product,['route'=>['admin.product.update',$product->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'name' => 'productForm', 'id' => 'productForm', 'novalidate'])!!}
			@else
			{!!Form::open(['route'=>'admin.product.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data', 'name' => 'productForm', 'id' => 'productForm', 'novalidate'])!!}
			@endif
			<div class="x_content"></div>
			<div class="row" id="contenido_principal">

				{!!Form::hidden('id', null)!!}
				<div class="form-group">
					{!!Form::label('title', 'Nombre del Producto', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::text('title', null, ['class'=>'form-control', 'placeholder' => 'Inserte Nombre del Producto', 'required', 'minlength'=> '5','onkeyup'=>'funciona()'])!!}
						<span class="label label-danger">{{$errors->first('title') }}</span>
					</div>
				</div>
				@if(isset($product))
					<div class="form-group">
						{!!Form::label('slug', 'Slug del Producto', ['class'=>'col-sm-2 control-label'])!!}
						<div class="col-sm-10">
							{!!Form::text('slug', null, ['class'=>'form-control', 'placeholder' => 'Ingrese su slug', 'required', 'minlength'=> '5'])!!}
							<span class="label label-danger">{{$errors->first('slug') }}</span>
						</div>
					</div>
				@endif

				<div class="form-group">
					{!!Form::label('description', 'Descripción', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::textarea('description', null, ['class'=>'form-control ckeditor', 'placeholder' => 'Inserte título', 'required', 'minlength'=> '10'])!!}
						<span class="label label-danger">{{$errors->first('description') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('subtitle', 'Descripción Breve (opcional)', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::text('subtitle', null, ['class'=>'form-control', 'placeholder' => 'Inserte Descripción Breve'])!!}
						<span class="label label-danger">{{$errors->first('subtitle') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('specifications', 'Especificaciones', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::textarea('specifications', null, ['class'=>'form-control ckeditor', 'placeholder' => 'Inserte Especificaciones', 'minlength'=> '10'])!!}
						<span class="label label-danger">{{$errors->first('specifications') }}</span>
					</div>
				</div>
				<div class="form-group">
					{!!Form::label('price', 'Precio Online', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::number('price', null, ['class'=>'form-control', 'placeholder' => 'Inserte Precio Online', 'min' => 0, 'required' => 'required'])!!}
						<span class="label label-danger">{{$errors->first('price') }}</span>
					</div>
				</div>

				<input type="hidden" name="local_price" id="local_price">

				<div class="form-group">
					{!!Form::label('tax', 'Incluir Impuesto (19%)', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{{Form::checkbox('tax', 1, isset($product)&&$product->tax)}}
						{!!Form::label('tax', 'Activar')!!}
						<span class="label label-danger">{{$errors->first('local_price') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('warranty', 'Garantía:', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::text('warranty', null, ['class'=>'form-control', 'placeholder' => 'Inserte Garantía', 'required', 'minlength'=> '5'])!!}
						<span class="label label-danger">{{$errors->first('warranty') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('quantity', 'Unidades Disponibles', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::number('quantity', null, ['class'=>'form-control', 'placeholder' => 'Inserte Cantidad de Unidades Disponibles', 'min' => 1, 'required'])!!}
						<span class="label label-danger">{{$errors->first('quantity') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('brands_id', 'Marca', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('brands_id', $brands, null, ['class' => 'form-control', 'title' => 'Seleccione una Marca', 'data-header' => 'Seleccione una Marca', 'data-live-search' => 'true', 'data-size' => '5', 'required'])!!}
						<span class="label label-danger">{{$errors->first('brands_id') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('processor_type', 'Compatibilidad con Procesador', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('processor_type', $comp, null, ['class' => 'form-control', 'title' => 'Seleccione una Compatibilidad', 'data-header' => 'Seleccione una Compatibilidad', 'required'])!!}
						<span class="label label-danger">{{$errors->first('processor_type') }}</span>
					</div>
				</div>

				<div class="form-group">						
					{!!Form::label('product_subcategories_id', 'Categorías', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-7">
						{!!Form::select('product_subcategories_id[]', $pcats, null, ['class' => 'form-control categories', 'title' => 'Seleccione una Categoría de Producto', 'data-header' => 'Seleccione una Categoría de Producto', 'data-live-search' => 'true', 'multiple','required', 'data-size' => '5','id'=>'product_subcategories_id'])!!}
						<span class="label label-danger">{{$errors->first('product_subcategories_id') }}</span>
					</div>
					<div class="col-sm-3">
						<button class="btn btn-primary" type="button" onclick="consultar()">Consultar caracteristicas</button>
					</div>
				</div>
				<div class="form-group" id="caracteristics">
					@if(isset($product))
						@foreach($categories as $category)

							<div class="form-group">
								<label class="col-sm-2 control-label">{{$category['name']}}</label>
								<div class="col-sm-10">
									<select  name="caracteristic[{{$category['id']}}][]" id="{{$category['id']}}" class="form-control" multiple data-live-search="true" data-header="Selecciona caracteristicas" required="required">
										@foreach($category['options'] as $option)
											@foreach($option as $key=> $value)

											<option value="{{$key}}" @foreach($product->categoryCaracteristic as $selectedOptions)
												@if($category['id'] == $selectedOptions->fk_category && $key == $selectedOptions->fk_caracteristic)
												selected
												@endif
											@endforeach>{{$value}}</option>
											@endforeach
										@endforeach
									</select>
								</div>
							</div>
						@endforeach
					@endif
				</div>

				{{-- <div class="form-group">
					{!!Form::label('filters_id', 'Filtros', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						@if(isset($product))
							<select class="form-control categories" data-live-search="true" name="filters_id[]" multiple>
								@foreach($filters as $key => $filterss)
								<option value="{{$key}}" @foreach($filter as $key2 => $filterP) @if($key == $key2) selected="selected" @endif @endforeach>{{$filterss}}</option>
								@endforeach
							</select>
						@else
							{!!Form::select('filters_id[]', $filters, null, ['class' => 'form-control categories', 'title' => 'Seleccione un Filtro de Producto', 'data-header' => 'Seleccione un Filtro de Producto', 'data-live-search' => 'true', 'multiple','required', 'data-size' => '5'])!!}
						@endif
						<span class="label label-danger">{{$errors->first('filters_id') }}</span>
					</div>
				</div> --}}

				<div class="form-group">
					{!!Form::label('tags', 'Etiquetas', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('tags[]', $tags, null, ['class' => 'form-control', 'title' => 'Seleccione una Etiqueta', 'data-header' => 'Seleccione una Etiqueta', 'data-live-search' => 'true', 'multiple','required', 'id' => 'tags', 'data-size' => '5'])!!}
						<span class="label label-danger">{{$errors->first('tags') }}</span>
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('tags', '&nbsp;', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-8">
						{!!Form::text('tags_add', null, ['class'=>'form-control', 'placeholder' => 'Etiquetas adicionales'])!!}
						<span class="text-success">Si usted no encuentra arriba las etiquetas adecuadas, por favor agréguelas con comas, y luego presione "Agregar".</span>
					</div>
					<div class="col-sm-2">
						{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i> Agregar', ['type' => 'button', 'class'=>'btn btn-primary btn-block', 'onclick' => 'add_tags()'])!!}
						<br>&nbsp;
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('dependencies', 'Producto(s) Padre', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('dependencies[]', $products, null, ['class' => 'form-control dependencies', 'title' => 'Seleccione un Producto Padre', 'data-header' => 'Seleccione un Producto Padre', 'data-live-search' => 'true', 'multiple', 'data-size' => '5'])!!}
					</div>
				</div>

				<div class="col-sm-12">
					<div class="x_content"></div>
					{!!Form::button('Guardar', array('type' => 'submit', 'class'=>'btn btn-success btn-block btn-lg','onclick'=>'igualar()'))!!}
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
{!!Html::script('/js/product.js')!!}
<script type="text/javascript">
	function igualar()
	{
		valor = $("#price").val();
		$('#local_price').val(valor);
	}
	function funciona()
	{
		str = $("#title").val();
	  str = str.replace(/^\s+|\s+$/g, ''); // trim
	  str = str.toLowerCase();

	  // remove accents, swap ñ for n, etc
	  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
	  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
	  for (var i=0, l=from.length ; i<l ; i++) {
	    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
	  }

	  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
	    .replace(/\s+/g, '-') // collapse whitespace and replace by -
	    .replace(/-+/g, '-'); // collapse dashes

	     $("#slug").val(str);
	}
	
	function consultar()
	{
        $("#caracteristics").empty();

		var categories = $("#product_subcategories_id").val();
	    var token = $('input[name="_token"]').val();
	    var route="/api/getcaracteristics";
		$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'post',
		dataType: 'json',
		data:{categories},
    	complete: function(transport)
    	{
    		data = transport.responseJSON;
    		console.log(data);
            new_tags = $('#tags').val();
            if (!new_tags) {
                new_tags = [];
            }
            carac = $("#caracteristics");
            for (x in data) {
            	console.log(data[x])
				html='<div class="form-group"><label class="col-sm-2 control-label">'+data[x].name+'</label><div class="col-sm-10"><select  name="caracteristic'+'['+data[x].id+'][]'+'" id="'+data[x].id+'" class="form-control" multiple data-live-search="true" data-header="Selecciona caracteristicas" required="required"></select></div></div>';
				carac.append(html);
				id  = data[x].id
				options(id);
                //     $("#tareas").append('<option value="'+data[x].id_task+'">'+data[x].tarea+'</option>').selectpicker('refresh');

                // new_tags.push(data[x].id);
            }
            // $('#tareas').selectpicker('val', new_tags);
            // $('[name=task]').val('');

	    	

	    }
	  });
	}

	function options(id)
	{
	    var token = $('input[name="_token"]').val();
	    var route="/api/geteachcaracteristic";
		$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'post',
		dataType: 'json',
		data:{id},
		complete: function(transport)
    	{
    		data = transport.responseJSON;
    		console.log(data);
            new_tags = [];

            for(x in data)
            {
            	$("#"+id).append('<option value="'+data[x].id+'">'+data[x].name+'</option>').selectpicker('refresh');
                new_tags.push(data[x].id);
            	
            }


                // new_tags.push(data[x].id);
            
            // $('#tareas').selectpicker('val', new_tags);
            // $('[name=task]').val('');
	    	

	    }
	  });

	}
</script>
@endsection
