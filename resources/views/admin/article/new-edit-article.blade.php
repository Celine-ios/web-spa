@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Artículos</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@if(isset($article))
		{!!Form::model($article,['route'=>['admin.article.update',$article->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'articleForm', 'novalidate'])!!}
		@else
		{!!Form::open(['route'=>'admin.article.store', 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data', 'id' => 'articleForm', 'novalidate'])!!}
		@endif
		<div class="x_content"></div>
		<div class="row">
			<div class="form-group">
				{!!Form::label('titulo', 'Titulo', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::text('titulo', null, ['class'=>'form-control', 'placeholder' => 'Inserte título', 'required'])!!}
					<span class="label label-danger">{{$errors->first('titulo') }}</span>
				</div>
			</div>
			<div class="form-group">
				{!!Form::label('texto', 'Texto', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::textarea('texto', null, ['class'=>'form-control ckeditor', 'placeholder' => 'Inserte título', 'required'])!!}
					<span class="label label-danger">{{$errors->first('texto') }}</span>
				</div>
			</div>
			<div class="form-group">
				{!!Form::label('article_categories_id', 'Categoria', ['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-10">
					{!!Form::select('article_types_id', $acats, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Categoría del Artículo', 'required'])!!}
					<span class="label label-danger">{{$errors->first('article_types_id') }}</span>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="x_content"></div>
				{!!Form::button('<i class="fa fa-check" aria-hidden="true"></i> Guardar', array('type' => 'submit', 'class'=>'btn btn-success btn-block btn-lg'))!!}
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
{!!Html::script('/vendors/ckeditor/ckeditor.js')!!}
<script type="text/javascript">
$("#articleForm").validate({
	ignore: [],
	debug: false,
	rules: {
		texto:{
			required: function() {
				CKEDITOR.instances.texto.updateElement();
			}, minlength:10
		}
	}
});
</script>
@endsection
