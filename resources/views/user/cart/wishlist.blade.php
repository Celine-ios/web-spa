@extends('user.layout.home')

@section('body')

<div class="container">
    <div class="col-md-8">
    <div class="titulo" style="display:none">

  </div>
        <h4>Mi Lista de Deseos:</h4>
        <div class="table-responsive tabla-deseos">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="width:3%">#</th>
                        <th style="width:57%">Producto</th>
                        <th style="width:15%">Precio</th>
                        <th style="width:25%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wishlists as $key => $product)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$product->product->title}}</td>
                        <td>
                            @if($product->product->quantity > 0)
                            {{cop_format($product->product->price)}}
                            @else
                                {{(strtotime($product->product->available_date) > strtotime(date('Y-m-d')) ? "Disponible en: ".$product->product->available_date : "Agotado")}}
                            @endif
                        </td>
                        <td style="padding-top:0 !important">
                            @if($product->product->quantity > 0)
                            {!!Form::open(['route'=>['add.cart',$product->product->slug],'method'=>'POST', 'class' => 'cart-form'])!!}{!!Form::hidden('qty', 1)!!}{!!Form::button('<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Agregar', array('type' => 'submit', 'class'=>'btn btn-primary btn-xs pull-left'))!!}{!!Form::close()!!}
                            @else
                            {!!Form::open(['url'=>['notify_product'],'method'=>'POST', 'class' => 'cart-form'])!!}{!!Form::hidden('slug', $product->product->slug)!!}{!!Form::button('<i class="fa fa-mobile"></i>&nbsp;&nbsp;Notifícame', array('type' => 'submit', 'class'=>'btn btn-warning btn-xs pull-left'))!!}{!!Form::close()!!}
                            @endif
                            <a href="{{url('remove_wishlist/'.$product->product->id)}}" class="btn btn-danger btn-xs pull-right" onclick="return confirm('¿Desea remover de la Lista de Deseos?');"><i class="fa fa-close"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('user.profile.product-relacionado')
    </div>

    <div class="col-md-4 text-center" >
        @include('user.profile.card-profile')

        <div class="banner-patrocinado">
            @include('user.includes.banner-impulso')
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    var otra = $('.global-menu').offset().top;

    $(window).on('scroll', function(){
        if ( $(window).scrollTop() > otra ){
            $('#MenuCategoria').css("display","");

        } else {
            $('#MenuCategoria').css("display","");
        }
    });
</script>
@endsection