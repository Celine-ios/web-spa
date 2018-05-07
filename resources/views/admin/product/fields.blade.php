@extends('admin.layout.index')
@section('styles')
{!!Html::style('/vendors/dropzone/dist/min/dropzone.min.css')!!}
@endsection
@section('content')
<section class="content-header">
    <h1 class="text-center">Administración de Productos</h1>
    <h3 class="text-center">Administración de Campos Adicionales del Producto: <br>{{$product->title}}</h3>
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

    <div class="col-md-12 col-sm-12 col-xs-12">
        {!!Form::open(['route'=>['admin.product.fields', $product->id], 'method'=>'POST', 'class'=> 'form-horizontal nuevo', 'enctype' => 'multipart/form-data', 'name' => 'productForm', 'id' => 'productForm', 'novalidate'])!!}
        {!!Form::hidden('id', null)!!}
        <div class="form-group">
            {!!Form::label('title', 'Nombre del Campo', ['class'=>'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                {!!Form::text('title', null, ['class'=>'form-control', 'placeholder' => 'Inserte Nombre del Campo', 'required', 'maxlength'=> '20'])!!}
                <span class="label label-danger">{{$errors->first('title') }}</span>
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('content', 'Contenido', ['class'=>'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                {!!Form::textarea('content', null, ['class'=>'form-control ckeditor', 'placeholder' => 'Inserte Contenido', 'required', 'minlength'=> '10'])!!}
                <span class="label label-danger">{{$errors->first('content') }}</span>
            </div>
        </div>

        <div class="form-group">
            <div class="x_content"></div>
            {!!Form::button('Guardar', array('type' => 'submit', 'class'=>'btn btn-success btn-block btn-lg'))!!}
        </div>

        {!!Form::close()!!}
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Listado de Campos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content"></div>
            <div class="row">
                <div class="col-sm-12" id="contenido_principal">
                    <div id="list-loteria">
                        <table class="table" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Contenido</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($product->additional as $additional)
                                <tr>
                                    <td>{{$additional->id}}</td>
                                    <td>{{$additional->title}}</td>
                                    <td>{!!$additional->content!!}</td>
                                    <td>{!!Form::open(['route'=> ['admin.additional.destroy', $additional->id] , 'method'=>'DELETE'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
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

</div>
</div>
@endsection
@section('scripts')
{!!Html::script('/vendors/ckeditor/ckeditor.js')!!}
{!!Html::script('/vendors/ckeditor/adapters/jquery.js')!!}
{!!Html::script('/js/product.js')!!}
@endsection
