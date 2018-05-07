@extends('admin.layout.index')
@section('styles')
{!!Html::style('/vendors/dropzone/dist/min/dropzone.min.css')!!}
@endsection
@section('content')
<section class="content-header">    
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
    <h1 class="text-center">Administración de Productos</h1>
    <h3 class="text-center">Administración de Imágenes del Producto: {{$product->title}}</h3>
</section>
<style type="text/css">
    .reorder_link {
    color: #3675B4;
    border: solid 2px #3675B4;
    border-radius: 3px;
    text-transform: uppercase;
    background: #fff;
    font-size: 18px;
    padding: 10px 20px;
    margin: 15px 15px 15px 0px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.35s;
    -moz-transition: all 0.35s;
    -webkit-transition: all 0.35s;
    -o-transition: all 0.35s;
    white-space: nowrap;
}
.reorder_link:hover {
    color: #fff;
    border: solid 2px #3675B4;
    background: #3675B4;
    box-shadow: none;
}
#reorder-helper{margin: 18px 10px;padding: 10px;}
.light_box {
    background: #efefef;
    padding: 20px;
    margin: 10px 0;
    text-align: center;
    font-size: 1.2em;
}

.gallery{ width:100%; float:left; }
.gallery ul{ margin:0; padding:0; list-style-type:none;}
.gallery ul li{ padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:150px; height:auto;}
.gallery img{ width:250px;}
.gallery ul li img{width: 100%;}
/* NOTICE */
.notice, .notice a{ color: #fff !important; }
.notice { z-index: 8888; }
.notice a { font-weight: bold; }
.notice_error { background: #E46360; }
.notice_success { background: #657E3F; }
</style>
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
                    <h2>Carga Automática de Imágenes (max. 2Mb)</h2>
                </div>
                {!!Form::open(['route'=>['admin.product.upload_images',$product->id],'method'=>'PUT', 'class'=> 'form-horizontal dropzone', 'enctype' => 'multipart/form-data', 'id' => 'my-dropzone'])!!}
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
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2>Listado de Imágenes Existentes</h2>
            </div>
            <div class="panel-body">
                <div>
                    <a href="javascript:void(0);" class="btn outlined mleft_no reorder_link" id="save_reorder">Reordenar fotos</a>
                    <div id="reorder-helper" class="light_box" style="display:none;">1. Reordena las imagenes según el orden deseado.<br>2. Click en 'Guardar nuevo orden'.</div>
                <div class="gallery">
                    <ul class="reorder_ul reorder-photos-list">
                @foreach($images as $image)

                        <li id="image_li_{{$image->id}}" class="ui-sortable-handle"><a href="javascript:void(0);" style="float:none;" class="image_link"><img src="{{asset('/images/products/'.$image->link_imagen)}}" alt=""></a>
                        {!!Form::open(['route'=> ['admin.product.delete_image', $image->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="fa fa-trash" aria-hidden="true"></span> Eliminar', array('type' => 'submit', 'class'=>'btn btn-danger btn-block', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</li>
                @endforeach
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!!Html::script('/vendors/dropzone/dist/min/dropzone.min.js')!!}
<script type="text/javascript">
    Dropzone.options.myDropzone = {
        autoProcessQueue: true,
        uploadMultiple: true,
        maxFiles: 4,
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
    $('.reorder_link').on('click',function(){
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('Guardar nuevo orden');
        $('.reorder_link').attr("id","save_reorder");
        $('#reorder-helper').slideDown('slow');
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#save_reorder").click(function( e ){
            if( !$("#save_reorder i").length ){
                $(this).html('').prepend('<img src="{{asset('images/loading.gif')}}"/>');
                $("ul.reorder-photos-list").sortable('destroy');
                $("#reorder-helper").html( "Reordenando las imagenes por favor no hacer cambios durante el guardado." ).removeClass('light_box').addClass('notice notice_error');
    
                var h = [];
                $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
                
                var token = $("#token").val();
                var route="/admin/reorder";

                $.ajax({
                url: route,
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                data:{ids: " " + h + ""},
                complete: function(transport)
                {   
                    location.reload();
                }
                });

                return false;
            }   
            e.preventDefault();     
        });
    });
});
</script>
@endsection
