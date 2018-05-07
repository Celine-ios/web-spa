<div class="destacados">

    {{-- la mitad aqui --}}
    <div class="owl-carousel" id="productos-destacados">
        <!--Inicio Producto-->
        @foreach($product_special as $key => $product)
        @if($key < $special_count)
        <div class="col-md-5 producto-slider">

            <!--Card-->
            <div class="card card-product hoverable">

                <!--Image-->
                <div class="card-image waves-effect waves-block waves-light view overlay hm-white-slight">
                    <!--Discount label-->
                    @if(count($product->discounts) > 0)
                    <h5 class="card-label"> <span class="label rgba-red-strong">-{{$product->discount_percent}}%</span></h5>
                    @endif

                    <a href="{{url('product/'.$product->slug)}}">
                        <img data-original="{{(file_exists('images/products/'.$product->image) ? asset('images/products/'.$product->image) : asset('images/no-image.jpg'))}}" class="lazy">

                        <div class="mask"> </div>
                    </a>
                </div>
                <!--/.Image-->

                <!--Rating-->
                <a class="btn middle tauret darken-4 btn-sm waves-effect waves-light rating"></a>
                <!--/.Rating-->

                <!--Card content: Name and price-->
                <div class="card-content text-center">
                    <div class="row contenedor-nombre-producto">
                        <a href="{{url('product/'.$product->slug)}}"><h5 class="product-title">{{$product->title}}</h5></a>
                    </div>
                    @if($product->quantity > 0)
                    <div class="price">
                        @if(count($product->discounts) > 0)
                        <p class="green-text medium-500">{{cop_format($product->discount_price)}} <span class="light-300 black-text strikethrough ">{{cop_format($product->price)}}</span></p>
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
    {{-- FIN PRIMER SLIDER --}}

    <div class="owl-carousel" id="productos-destacados2">
        <!--Inicio Producto-->
        @foreach($product_special as $key => $product)
        @if($key >= $special_count)

        <div class="col-md-5 producto-slider">

            <!--Card-->
            <div class="card card-product hoverable">


                <!--Image-->
                <div class="card-image waves-effect waves-block waves-light view overlay hm-white-slight">
                    <!--Discount label-->
                    @if(count($product->discounts) > 0)
                    <h5 class="card-label"> <span class="label rgba-red-strong">-{{$product->discount_percent}}%</span></h5>
                    @endif

                    <a href="{{url('product/'.$product->slug)}}">
                        <img data-original="{{(file_exists('images/products/'.$product->image) ? 'images/products/'.$product->image : 'images/no-image.jpg')}}" class="lazy">

                        <div class="mask"> </div>
                    </a>
                </div>
                <!--/.Image-->

                <!--Rating-->
                <a class="btn middle tauret darken-4 btn-sm waves-effect waves-light rating">
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
