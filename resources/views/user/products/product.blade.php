@extends('user.layout.home')

@section('body')
    {{-- <section>
    <figure class="col-md-4">
    <!--Large image-->
    <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(114).jpg" data-size="1600x1067">
    <!-- Thumbnail-->
    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(114).jpg" class="img-fluid">
</a>
</figure>
</section> --}}

<section class="container">
    <!--Product Panel-->
    <div class="container-fluid">
      <div class="titulo" style="display:none">

      </div>
        <div class="card-panel product-panel hoverable">
            <div class="row">
                <div class="col-md-12 panel-stick">

                    <div class="col-md-4 col-xs-12 col-sm-6 titulo-detalle-producto">
                        <!--Title-->
                        @if(count($product->discounts) > 0)
                            <h4>{{$product->title}} <span class="label rgba-red-strong">-{{$product->discount_percent}}%</span></h4>
                        @else
                            <h4>{{$product->title}}</h4>
                        @endif
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 detalle-precios">
                        <!--Price-->
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
                            <div class="price col-xs-12">
                                <p class="light-300 black-text">
                                    @if(strtotime($product->available_date) > strtotime(date('Y-m-d')))
                                        <small>Disponible en: {{$product->available_date}}</small>
                                    @else
                                        Agotado
                                    @endif
                                </p>
                            </div>
                        @endif
                        <div class="botones-carro col-md-4 col-xs-9">
                            <!--Quantity-->
                            @if($product->quantity > 0)
                                {!!Form::open(['route'=>['add.cart',$product->slug],'method'=>'POST'])!!}
                                {!!Form::number('qty', 1, ['class' => 'quantity'])!!}
                                {!!Form::button('COMPRAR', array('type' => 'submit', 'class'=>'btn btn-primary btn-sm waves-effect waves-light'))!!}
                                {!!Form::close()!!}
                            @else
                                {!!Form::open(['url'=>['notify_product',$product->slug],'method'=>'POST'])!!}
                                {!!Form::hidden('slug', $product->slug)!!}
                                {!!Form::button('NOTIFICAR EXISTENCIAS', array('type' => 'submit', 'class'=>'btn btn-warning btn-sm waves-effect waves-light'))!!}
                                {!!Form::close()!!}
                            @endif
                        </div>
                        <div class="deseos-detalle col-md-2 col-xs-3">
                            <!--Wish list button-->
                            <a href="{{url('add_wishlist/'.$product->slug)}}" class="btn-floating btn-small waves-effect waves-light red darken-4 top-btn"><i class="material-icons">favorite</i></a>
                        </div>
                    </div>
                    <hr>
                </div>
                <!--First column: carousel gallery-->
                <div class="col-xs-12 col-sm-6 col-lg-4">


                    <div id="carousel-thum" class="carousel slide carousel-fade carousel-thumbnails">


                        <!-- Wrapper for slides -->
                        <div class="carousel-inner z-depth-2" role="listbox">

                            <!-- First slide -->
                                      @foreach($product->images as $key => $images)

                                <div class="item {{($key == 0 ? 'active' : '')}}" >

                                    <img src="{{(file_exists('images/products/'.$images->link_imagen) ? url('images/products/'.$images->link_imagen) : 'images/no-image.jpg')}}" data-toggle="modal" data-target="#myModal{{$key}}" alt="{{$key}}">
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal{{$key}}" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content" style="
                                        background: rgba(0, 0, 0, 0);
                                        box-shadow: none;
                                        border: none;
                                        ">

                                            <div class="modal-body">
                                              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="top: 9px;right: 10px;position: absolute;padding: 2px 11px;"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                                <img style=" width:100%; height:auto;" src="{{(file_exists('images/products/'.$images->link_imagen) ? url('images/products/'.$images->link_imagen) : 'images/no-image.jpg')}}">
                                            </div>
                                            <div class="modal-footer" style="
                                            border: none;">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.item -->
                            @endforeach




                        </div>
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            @foreach($product->images as $key => $images)
                                <li data-target="#carousel-thum" data-slide-to="{{$key}}" class="{{($key == 0 ? 'active' : '')}}">
                                    <img src="{{(file_exists('images/products/'.$images->link_imagen) ? url('images/products/'.$images->link_imagen) : 'images/no-image.jpg')}}" alt="" class="img-responsive">
                                </li>



                            @endforeach
                        </ul>
                        <!-- /.carousel-inner -->

                    </div>
                    <!-- /.carousel -->

                    <div class="social-butons">
                        <a class="btn-floating btn-small waves-effect waves-light blue darken-4 top-btn dropdown-button" href="#" data-activates="dropdown1"><i class="material-icons">share</i></a>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="{{$product->links['facebook']}}" target="_blank" class="btn-floating btn-small waves-effect waves-light fb-bg"><i class="fa fa-facebook"> </i></a></li>
                            <li><a href="{{$product->links['twitter']}}" target="_blank" class="btn-floating btn-small waves-effect waves-light tw-bg"><i class="fa fa-twitter"> </i></a></li>
                            <li><a href="{{$product->links['gplus']}}" target="_blank" class="btn-floating btn-small waves-effect waves-light gplus-bg "><i class="fa fa-google-plus"> </i></a></li>
                            <li><a href="{{$product->links['linkedin']}}" target="_blank" class="btn-floating btn-small waves-effect waves-light li-bg"><i class="fa fa-linkedin"> </i></a></li>
                            <li><a href="{{$product->links['pinterest']}}" target="_blank" class="btn-floating btn-small waves-effect waves-light pin-bg "><i class="fa fa-pinterest"> </i></a></li>
                            <li><a href="{{$product->links['gmail']}}" target="_blank" class="btn-floating btn-small waves-effect waves-light email-bg"><i class="fa fa-envelope-o"> </i></a></li>
                        </ul>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-tauret btn-lg waves-effect waves-light" href="{{url('contacto/'.$product->slug)}}" target="_new" style="padding: 4px 10px;">¿ALGUNA PREGUNTA?</a>

                        <a class="btn btn-tauret btn-lg waves-effect waves-light" href="{{url('products/category?cat='.$categoria->slug)}}" target="_new" style="padding: 4px 10px;">Ver más de {{$categoria->slug}} </a>
                    </div>
                </div>
                <!--/.First column: carousel gallery-->



                <!--Third column: product description-->
                <div class="descripcion">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descripción</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Especificaciones</a></li>
                        <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Videos</a></li>
                        @foreach($product->additional as $additional)
                            <li role="presentation"><a href="#{{slugify_text($additional->title)}}" aria-controls="videos" role="tab" data-toggle="tab">{{$additional->title}}</a></li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="col-md-12 texto-tabs">
                                {!!str_replace("<br>", '', $product->description)!!}
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <div class="col-md-12 texto-tabs">
                                {!!$product->specifications!!}
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="videos">
                            <div class="col-md-12 texto-tabs">
                                @foreach($product->videos as $video)
                                    <div class="row">
                                        <iframe class="col-md-12" height="400" src="https://www.youtube.com/embed/{{$video->link_video}}" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <hr>

                                @endforeach

                            </div>
                        </div>
                        @foreach($product->additional as $additional)
                            <div role="tabpanel" class="tab-pane" id="{{slugify_text($additional->title)}}">
                                <div class="col-md-12 texto-tabs">
                                    {!!$additional->content!!}
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>



                <!--/.Third column: product description-->

                <!--Second column: product details-->

                <!--Second column: product details-->


            </div>
        </div>
@if(count($padres)>0)
        <h4>Productos para tí:</h4>
        <div class="owl-carousel" id="productos-lista">
            <!-- Si el prodcuto esta en la lista selecionalos y muestralos aquí-->
            @foreach($padres as $prelated)
            <div class="col-md-12">
                <!--Card-->
                <div class="card card-product hoverable">
                    <!--Wish list and social share buttons-->
                    <ul class="text-right extra-buttons">
                        <li><a href="{{url('add_wishlist/'.$prelated->slug)}}" class="btn-floating btn-small waves-effect waves-light red darken-4 top-btn" data-toggle="tooltip" data-placement="left" data-original-title="Añadir a Lista de Deseos"><i class="material-icons">favorite</i></a></li>
                        <li><a class="btn-floating btn-small waves-effect waves-light blue darken-4 top-btn activator" data-toggle="tooltip" data-placement="left" data-original-title="Compartir"><i class="material-icons">share</i></a></li>
                    </ul>
                    <!--/.Wish list and social share buttons-->

                    <!--Image-->
                    <div class="card-image waves-effect waves-block waves-light view overlay hm-white-slight">
                        <!--Discount label-->
                        @if(count($prelated->discounts) > 0)
                        <h5 class="card-label"> <span class="label rgba-red-strong">-{{$prelated->discount_percent}}%</span></h5>
                        @endif

                        <a href="{{url('product/'.$prelated->slug)}}">
                            <img src="@if(file_exists('images/products/'.$prelated->image)) @if(count($prelated->images)!=0) {{asset('images/products/'.$prelated->images->first()->link_imagen)}} @else {{asset('images/products/'.$prelated->image)}} @endif @else {{asset('images/no-image.jpg')}} @endif">
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
                            <a href="{{url('product/'.$prelated->slug)}}"><h5 class="product-title">{{$prelated->title}}</h5></a>
                        </div>
                        <div class="price">
                            @if($prelated->quantity > 0)
                            <div class="price">
                                @if(count($prelated->discounts) > 0)
                                <p class="green-text medium-500">{{cop_format($prelated->discount_price)}} <span class="discount light-300 black-text">{{cop_format($prelated->price)}}</span></p>
                                @else
                                <p class="light-300 black-text">
                                    {{cop_format($prelated->price)}}
                                </p>
                                @endif
                            </div>
                            @else
                            <div class="price">
                                <p class="light-300 black-text">
                                    @if(strtotime($prelated->available_date) > strtotime(date('Y-m-d')))
                                    <small>Disponible en: {{$prelated->available_date}}</small>
                                    @else
                                    Agotado
                                    @endif
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!--/.Card content: Name and price-->

                    <!--Buttons-->
                    <div class="card-btn text-center">
                        @if($prelated->quantity > 0)
                        {!!Form::open(['route'=>['add.cart',$prelated->slug],'method'=>'POST', 'class' => 'cart-form'])!!}{!!Form::hidden('qty', 1)!!}{!!Form::button('<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Agregar', array('type' => 'submit', 'class'=>'btn btn-primary btn-cart waves-effect waves-light'))!!}{!!Form::close()!!}
                        @else
                        {!!Form::open(['url'=>['notify_product'],'method'=>'POST', 'class' => 'cart-form'])!!}{!!Form::hidden('slug', $prelated->slug)!!}{!!Form::button('<i class="fa fa-mobile"></i>&nbsp;&nbsp;Notifícame', array('type' => 'submit', 'class'=>'btn btn-warning btn-cart waves-effect waves-light'))!!}{!!Form::close()!!}
                        @endif
                        <a href="{{url('quick-look/'.$prelated->slug)}}" class="btn btn-default btn-cart waves-effect waves-light view-link pull-left">Vista rapida</a>
                    </div>
                    <!--/.Buttons-->

                    <!--Social buttons-->
                    <div class="card-reveal text-center">
                        <span class="card-title grey-text text-darken-4">Comparte con tus amigos:<i class="material-icons right">close</i></span>
                        <hr>
                        <a href="{{$prelated->links['facebook']}}" target="_blank" class="btn-sm fb-bg rectangle waves-effect waves-light"><i class="fa fa-facebook"> </i></a>
                        <a href="{{$prelated->links['twitter']}}" target="_blank" class="btn-sm tw-bg rectangle waves-effect waves-light"><i class="fa fa-twitter"> </i></a>
                        <a href="{{$prelated->links['gplus']}}" target="_blank" class="btn-sm gplus-bg rectangle waves-effect waves-light"><i class="fa fa-google-plus"> </i></a>
                        <a href="{{$prelated->links['linkedin']}}" target="_blank" class="btn-sm li-bg rectangle waves-effect waves-light"><i class="fa fa-linkedin"> </i></a>
                        <a href="{{$prelated->links['pinterest']}}" target="_blank" class="btn-sm pin-bg rectangle waves-effect waves-light"><i class="fa fa-pinterest"> </i></a>
                        <a href="{{$prelated->links['gmail']}}" target="_blank" class="btn-sm email-bg rectangle waves-effect waves-light"><i class="fa fa-envelope-o"> </i></a>
                    </div>
                    <!--/.Social buttons-->

                </div>
                <!--/.Card-->
            </div>
            @endforeach
        </div>
        @endif


    </div>
    <!--/.Product Panel-->
</section>

@endsection
@section('add_js')
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
