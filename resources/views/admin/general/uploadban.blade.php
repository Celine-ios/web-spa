@extends('admin.layout.index')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Banners</h1>
		<h3 class="text-center">Administración de Banner del Tipo: {{$btype->nombre}}</h3>
		<p class="text-center">Tamaños: <strong>Principal:</strong> 911x345px |
			<strong>Secundario Home:</strong> 609x168px |
			<strong>Publicidad Home:</strong> 731x170px |
			<strong>Categorias:</strong> 673x336px |
			<strong>Marcas:</strong> 1140x240px |
		 </p>
	</section>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<a href="/admin/banner" class="btn btn-warning btn-lg btn-block"><i class="fa fa-backward" aria-hidden="true"></i> Volver</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2>{{($tipo === 'imagen' ? 'Carga Automática de Imágenes (max. 2Mb)' : 'Inserte el video de YouTube')}}</h2>
				</div>
				@if($tipo === 'imagen')
				{!!Form::open(['route'=> 'admin.banner.store','method'=>'POST', 'class'=> 'form-horizontal dropzone', 'enctype' => 'multipart/form-data', 'id' => 'myDropzone'])!!}
				{!!Form::hidden('id', $btype->id)!!}

				{!!Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Ingrese un enlace del servicio'])!!}
				<div class="panel-body">
					<div class="dropzone-previews"></div>
					<div class="dz-message" style="height:200px;">
						Sube las imágenes aquí
					</div>
				</div>
				{!! Form::close() !!}

				@elseif($tipo === 'video')
				{!!Form::open(['route'=>['admin.banner.update', $btype->id],'method'=>'PUT', 'class'=> 'form-horizontal', 'enctype' => 'multipart/form-data'])!!}
				<div class="form-group">
					<div class="col-sm-10">
						{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo video de banner'])!!}
					</div>

					<div class="col-sm-2">
						{!!Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Guardar', array('type' => 'submit', 'class'=>'btn btn-primary'))!!}
					</div>
				</div>
				{!! Form::close() !!}
				@endif
			</div>
		</div>
	</div>

	<div class="col-sm-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Listado de Banners Existentes</h2><br>
			</div>
			<div class="x_content">
				@if($tipo === 'imagen')
				@foreach($banners as $banner)
				<div class="col-lg-3 col-md-4 col-xs-6">
					<div class="thumbnail">
						<img src="{{asset($banner->link_imagen)}}">
					</div>
{!!Form::open(['url'=> ['admin/updatebanner'] , 'method'=>'POST', 'class'=> 'form-horizontal'])!!}
					<input type="text" name="url" value="{{$banner->link}}" required="">
					<input type="hidden" name="id" value="{{$banner->id}}">
					{!!Form::button('<i class="fa fa-pencil" aria-hidden="true"></i> Actualizar', array('type' => 'submit', 'class'=>'btn btn-success btn-block'))!!}
					{!!Form::close()!!}
					{!!Form::open(['route'=> ['admin.banner.destroy', $banner->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="fa fa-trash" aria-hidden="true"></span> Eliminar', array('type' => 'submit', 'class'=>'btn btn-danger btn-block', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}
				</div>
				@endforeach
				@elseif($tipo === 'video')
				@if($banners)
				<div class="text-center">
					<iframe class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12" height="380" src="https://www.youtube.com/embed/{{$banners->link_imagen}}" frameborder="0" allowfullscreen></iframe>
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
						{!!Form::open(['route'=> ['admin.banner.destroy', $banners->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="fa fa-trash" aria-hidden="true"></span> Eliminar', array('type' => 'submit', 'class'=>'btn btn-danger btn-block', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}
					</div>
				</div>
				@endif
				@endif

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
		maxFiles: 2,
		acceptedFiles: '.jpg, .jpeg, .png, .bmp',

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
