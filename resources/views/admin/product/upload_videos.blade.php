@extends('admin.layout.index')
@section('styles')
{!!Html::style('/vendors/dropzone/dist/min/dropzone.min.css')!!}
@endsection
@section('content')
<section class="content-header">
    <h1 class="text-center">Administración de Productos</h1>
    <h3 class="text-center">Administración de Vídeos del Producto: {{$product->title}}</h3>
</section>

<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{url('/admin/product')}}" class="btn btn-info btn-lg btn-block"><i class="fa fa-backward" aria-hidden="true"></i> Volver a la lista de productos</a>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-warning btn-lg btn-block"><i class="fa fa-backward" aria-hidden="true"></i> Volver al Producto</a>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2>Carga Automática de Vídeos (sólo links de YouTube)</h2>
                </div>
                {!!Form::open(['route'=>['admin.product.upload_videos', $product->id],'method'=>'POST', 'class'=> 'form-horizontal'])!!}
                <div class="form-group">
                    <div class="col-sm-10">
                        {!!Form::text('link_video', null, ['class'=>'form-control', 'placeholder'=>'Ingresa un nuevo video de producto'])!!}
                    </div>

                    <div class="col-sm-2">
                        {!!Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Guardar', array('type' => 'submit', 'class'=>'btn btn-primary'))!!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2>Listado de Vídeos Existentes</h2>
            </div>
            <div class="panel-body">
                @foreach($product->videos as $video)
                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="thumbnail">
                        <iframe class="col-md-12" height="150" src="https://www.youtube.com/embed/{{$video->link_video}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    {!!Form::open(['route'=> ['admin.product.delete_video', $video->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="fa fa-trash" aria-hidden="true"></span> Eliminar', array('type' => 'submit', 'class'=>'btn btn-danger btn-block', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
{!!Html::script('/vendors/dropzone/dist/min/dropzone.min.js')!!}
{!!Html::script('/js/dropzone_admin.js')!!}
@endsection
