@extends('admin.layout.index')

@section('content')
@section('styles')
{!!Html::style('/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')!!}
@endsection

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Categorias de caracteristicas de Productos</h1>
	</section>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Nueva caracteristica de Producto</h2><br></div>
		<div class="x_content">
			{!!Form::open(['route'=>'admin.category_caracteristic.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo'])!!}
			<div class="form-group">
				<div class="col-sm-5">
					<label for="">Nombre</label><br>
					{!!Form::text('category_name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa una nuevo filtro de producto','required'=>'required'])!!}
				</div>
				
				<div class="form-group">
					{!!Form::label('caracteristics', 'Caracteristicas', ['class'=>'col-sm-2 control-label'])!!}
					<div class="col-sm-6">
						{!!Form::select('caracteristics[]', $caracteristics, null, ['class' => 'form-control', 'title' => 'Seleccione las caracteristicas pertenecientes', 'data-header' => 'Seleccione las caracteristicas pertenecientes', 'data-live-search' => 'true', 'multiple','required', 'id' => 'caracteristics','required'=>'required'])!!}
						<span class="label label-danger">{{$errors->first('caracteristics') }}</span>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-5"><span class="text-success">Si usted no encuentra las caracteristicas adecuadas, por favor agréguelas con comas, y luego presione "Agregar".</span></div>
					<div class="col-sm-4 ">

						{!!Form::text('caracteristics_add', null, ['class'=>'form-control', 'placeholder' => 'Etiquetas adicionales'])!!}
						
					</div>
					<div class="col-sm-2">
						{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i> Agregar', ['type' => 'button', 'class'=>'btn btn-primary btn-block', 'onclick' => 'add_caracteristics()'])!!}
						<br>&nbsp;
					</div>
				</div>
				<div class="col-sm-2 col-md-offset-5">
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
			<h2>Lista de Filtros de Productos</h2>
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
							<th>Caracteristicas</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($categories as $categories)
							<tr>
								<td>{{$categories->id_caracteristic_category}}</td>
								<td><a id="nombre" data-type="text" data-pk="{{$categories->category_name}}" data-title="Inserte Nombre del filtro" class="editable editable-click editable-text" style="display: inline;">{{$categories->category_name}}</a></td>
								<td>
									<ul>

										@foreach($categories->caracteristics as $caracteristic)
										<li>{{$caracteristic->name_caracteristic}}</li>
										@endforeach
									</ul>
								</td>
								<td class="alin"><a href="{{ route('admin.category_caracteristic.edit', $categories->id_caracteristic_category) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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
<script type="text/javascript">
$(document).ready(function(){
    $('select').selectpicker();
    });
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
