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
			{!!Form::model($category,['route'=>['admin.category_caracteristic.update',$category->id_caracteristic_category],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'name' => 'productForm', 'id' => 'productForm'])!!}
			<div class="x_content"></div>
			<div class="row" id="contenido_principal">

				<div class="form-group">
					{!!Form::label('nombre', 'Nombre', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::text('category_name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa una nuevo filtro de producto','required'=>'required'])!!}
					</div>

				</div>

				<div class="form-group">
					{!!Form::label('caracteristics', 'Caracteristicas', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
						{!!Form::select('caracteristics[]', $caracteristics, null, ['class' => 'form-control caracteristics', 'title' => 'Seleccione caracteristicas pertenecientes', 'data-header' => 'Seleccione caracteristicas pertenecientes', 'data-live-search' => 'true', 'multiple', 'required','id'=>'caracteristics'])!!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5 col-md-offset-1"><span class="text-success">Si usted no encuentra las caracteristicas adecuadas, por favor agréguelas con comas, y luego presione "Agregar".</span></div>
					<div class="col-sm-4 ">

						{!!Form::text('caracteristics_add', null, ['class'=>'form-control', 'placeholder' => 'Etiquetas adicionales'])!!}
						
					</div>
					<div class="col-sm-2">
						{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i> Agregar', ['type' => 'button', 'class'=>'btn btn-primary btn-block', 'onclick' => 'add_caracteristics()'])!!}
						<br>&nbsp;
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
$('.caracteristics').selectpicker('val', {{$category->caracteristics->pluck('id_caracteristic')}});


function add_caracteristics() {
    var caracteristics = $('[name=caracteristics_add]').val();
    var _token = $('input[name="_token"]').val();
    if(caracteristics.length > 0){
        var caracteristics = {'caracteristics': caracteristics, '_token': _token};
        $.post('/api/add_caracteristics', caracteristics, function( response ) {
            data = response.new;
            console.log(data);
            new_tags = $('#caracteristics').val();
            if (!new_tags) {
                new_tags = [];
            }
            for (x in data) {
                if ($('#caracteristics').find('[value='+data[x].id+']').length == 0) {
                    $("#caracteristics").append('<option value="'+data[x].id+'">'+data[x].nombre+'</option>').selectpicker('refresh');
                }
                new_tags.push(data[x].id);
            }
            $('#caracteristics').selectpicker('val', new_tags);
            $('[name=caracteristics_add]').val('');
        });
    }
}	
</script>
@endsection
