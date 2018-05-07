@extends('user.layout.home')
@section('body')

    <div class="container">
        <div class="banner-marca" style="width:100%;height:250px;margin-top:-30px;overflow:hidden;text-align: center;margin-bottom: -16px;">

          @if(count($TipoBanner) >0)
            @if(isset($TipoBanner->banners))
                    <img src="{{asset($TipoBanner->banners->first()->link_imagen)}}">
            @endif
          @endif
        </div>


        <div class="only-mobile">
            <h5 class="titulo segundo" style="color:white !important;" id="titulo"><span class="pull-right">MARCA: {{$brand->nombre}}</span></h5>
        </div>
        <div class="container">
            <div class="row">
                <div>
                    {!!Form::open(['url'=> Request::path(), 'method'=>'GET'])!!}
                    <div class="row" >
                            <div class="col-md-4">
                            {!!Form::select('filters[]', $filters, (isset($sel_filter)? $sel_filter: null), ['class' => 'form-control browser-default', 'title' => 'Filtrar por características', 'data-live-search' => 'true', 'multiple', 'id' => 'tags', 'data-size' => '5'])!!}
                            {!!Form::hidden('brand', Request::input('brand'))!!}
                        </div>
                        <div class="col-md-2">
                            {!!Form::button('<i class="fa fa-search" aria-hidden="true"></i> Enviar', array('type' => 'submit', 'class'=>'btn btn-tauret', 'style' => 'height: 30px;margin-top: 6px;padding: 0 15px;'))!!}
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>

        </div>

        <div class="row">
            <!--Inicio Producto-->
            @foreach($products as $product)
                @if(isset($product->slug))
                    <div class="col-md-3">

                        <!--Card-->
                        <div class="card card-product hoverable">


                            <!--Image-->
                            <div class="card-image waves-effect waves-block waves-light view overlay hm-white-slight">
                                <!--Discount label-->
                                @if(count($product->discounts) > 0)
                                    <h5 class="card-label"> <span class="label rgba-red-strong">-{{$product->discount_percent}}%</span></h5>
                                @endif

                                <a href="{{url('product/'.$product->slug)}}">
                                    <img data-original="@if(file_exists('images/products/'.$product->image)) @if(count($product->images)!=0) {{asset('images/products/'.$product->images->first()->link_imagen)}} @else {{asset('images/products/'.$product->image)}} @endif @else {{asset('images/no-image.jpg')}} @endif" class="lazy">
                                    <div class="mask"> </div>
                                </a>
                            </div>
                            <!--/.Image-->

                            <!--Rating-->
                            <a class="btn middle tauret darken-4 btn-sm waves-effect waves-light rating">
                                {{-- <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star_border</i> --}}
                            </a>
                            <!--/.Rating-->

                            <!--Card content: Name and price-->
                            <div class="card-content text-center">
                                <div class="row contenedor-nombre-producto">
                                    <a href="{{url('product/'.$product->slug)}}"><h5 class="product-title">{{$product->title}}</h5></a>
                                </div>
                                @if($product->quantity > 0)
                                    <div class="price">
                                        @if(count($product->discounts) > 0)
                                        <p class="green-text medium-500">{{cop_format($product->discount_price)}}</p>
                                        <div class="descuento-la"><span class="light-300 black-text strikethrough">{{cop_format($product->price)}}</span></div>
                                        @else
                                            <p class="light-300 black-text">
                                                {{cop_format($product->price)}}
                                            </p>
                                        @endif
                                    </div>
                                @else
                                    <div class="price">
                                        <p class="light-300 black-text">
                                            @if(strtotime($product->available_date) > strtotime(date('Y-m-d')))
                                                <small>Disponible en: {{$product->available_date}}</small>
                                            @else
                                                Agotado
                                            @endif
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <!--/.Card content: Name and price-->

                            <!--Buttons-->
                            <div class="card-btn text-center">
                                @if($product->quantity > 0)
                                    {!!Form::open(['route'=>['add.cart',$product->slug],'method'=>'POST', 'class' => 'cart-form'])!!}{!!Form::hidden('qty', 1)!!}{!!Form::button('<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Agregar', array('type' => 'submit', 'class'=>'btn btn-primary btn-cart waves-effect waves-light'))!!}{!!Form::close()!!}
                                @else
                                    {!!Form::open(['url'=>['notify_product'],'method'=>'POST', 'class' => 'cart-form'])!!}{!!Form::hidden('slug', $product->slug)!!}{!!Form::button('<i class="fa fa-mobile"></i>&nbsp;&nbsp;Notifícame', array('type' => 'submit', 'class'=>'btn btn-warning btn-cart waves-effect waves-light'))!!}{!!Form::close()!!}
                                @endif
                                <!--Wish list and social share buttons-->
                                <ul class="extra-buttons2">
                                    <li><a href="{{url('add_wishlist/'.$product->slug)}}" class="btn-floating btn-small waves-effect waves-light red darken-4 top-btn" ><i class="material-icons">favorite</i></a></li>
                                    <li><a class="btn-floating btn-small waves-effect waves-light blue darken-4 top-btn activator"><i class="material-icons">share</i></a></li>
                                </ul>
                                <!--/.Wish list and social share buttons-->
                            </div>
                            <!--/.Buttons-->

                            <!--Social buttons-->
                            <div class="card-reveal text-center">
                                <span class="card-title grey-text text-darken-4">Comparte con tus amigos:<i class="material-icons right">close</i></span>
                                <hr>
                                <a href="{{$product->links['facebook']}}" target="_blank" class="btn-sm fb-bg rectangle waves-effect waves-light"><i class="fa fa-facebook"> </i></a>
                                <a href="{{$product->links['twitter']}}" target="_blank" class="btn-sm tw-bg rectangle waves-effect waves-light"><i class="fa fa-twitter"> </i></a>
                                <a href="{{$product->links['gplus']}}" target="_blank" class="btn-sm gplus-bg rectangle waves-effect waves-light"><i class="fa fa-google-plus"> </i></a>
                                <a href="{{$product->links['linkedin']}}" target="_blank" class="btn-sm li-bg rectangle waves-effect waves-light"><i class="fa fa-linkedin"> </i></a>
                                <a href="{{$product->links['pinterest']}}" target="_blank" class="btn-sm pin-bg rectangle waves-effect waves-light"><i class="fa fa-pinterest"> </i></a>
                                <a href="{{$product->links['gmail']}}" target="_blank" class="btn-sm email-bg rectangle waves-effect waves-light"><i class="fa fa-envelope-o"> </i></a>
                            </div>
                            <!--/.Social buttons-->

                        </div>
                        <!--/.Card-->
                    </div>
                @endif
            @endforeach
            <!--fin Producto-->
        </div>
    </div>
@endsection

@section('add_js')
    <script type="text/javascript">
        $('.browser-default').selectpicker({
            style:           '',
            deselectAllText: 'Quitar Todos',
            selectAllText:   'Agregar Todos',
            actionsBox:      true
        });

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
