@extends('admin.layout.index')

@section('content')
<?php
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Documentos</h1>
		<h3 class="text-center">Administración de Documento del Tipo: {{$btype->nombre}}</h3>
	</section>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<a href="/admin/document" class="btn btn-warning btn-lg btn-block"><i class="fa fa-backward" aria-hidden="true"></i> Volver</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2>Carga Automática de Archivos (max. 20Mb)</h2>
				</div>
				{!!Form::open(['route'=> 'admin.document.store','method'=>'POST', 'class'=> 'form-horizontal dropzone', 'enctype' => 'multipart/form-data', 'id' => 'myDropzone'])!!}
				{!!Form::hidden('document_category_id', $btype->id)!!}
				{!!Form::hidden('titulo', strtoupper($btype->slug).date('Ymd'))!!}
				<div class="panel-body">
					<div class="dropzone-previews"></div>
					<div class="dz-message" style="height:200px;">
						Sube las imágenes aquí
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<div class="col-sm-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Listado de Documentos Existentes</h2><br>
			</div>
			<div class="x_content">
				<table class="table" role="grid" aria-describedby="datatable_info">
					<thead>
						<th>ID</th>
						<th>Documento</th>
						<th></th>
					</thead>
					<tbody>
						@foreach($banners as $banner)
						<tr>
							<td>{{$banner->id}}</td>
							<td><a href="{{url("documents/".$banner->link_documento)}}" target="_new">{{$banner->titulo}}</a></td>
							<td class="alin">{!!Form::open(['route'=> ['admin.document.destroy', $banner->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
@section('styles')
{!!Html::style('/vendors/dropzone/dist/min/dropzone.min.css')!!}
@endsection

@section('scripts')
{!!Html::script('/vendors/dropzone/dist/min/dropzone.min.js')!!}
<script type="text/javascript">
	Dropzone.options.myDropzone = {
		autoProcessQueue: true,
		uploadMultiple: true,
		maxFiles: 1,
		acceptedFiles: '.jpg, .jpeg, .png, .bmp, .doc, .docx, .pdf, .xls, .xlsx, .ppt, .pptx',

		init: function() {
			var submitBtn = document.querySelector("#submit");
			myDropzone = this;

			this.on("complete", function(file) {
				myDropzone.removeFile(file);
				if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
					 location.reload();
				}
			});

			this.on("success", function() {
				myDropzone.processQueue.bind(myDropzone);
			});
		}
	};

</script>
<!-- {!!Html::script('/js/dropzone_admin.js')!!} -->
@endsection
