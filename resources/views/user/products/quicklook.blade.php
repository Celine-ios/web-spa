<div class="modal-dialog modal-qlook">

    <!--Modal content-->
    <div class="modal-content">
        <!-- Modal header-->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            @if(count($product->discounts) > 0)
            <h4 class="modal-title text-center">{{$product->title}} <span class="label rgba-red-strong">-{{$product->discount_percent}}%</span></h4>
            @else
            <h4 class="modal-title text-center">{{$product->title}}</h4>
            @endif
        </div>
        <!-- /.Modal conheaderent-->
        <!-- Modal body-->
        <div class="modal-body">
            <!--Product Panel-->
            <div class="container-fluid">
                <div class="product-panel">
                    <div class="row">
                        <!--First column: carousel gallery-->
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <!-- Carousel -->
                            <div id="car-gall" class="carousel slide carousel-fade carousel-thumbnails carousel-gallery">
                                <!--Main image-->
                                <div class="col-xs-12 img-principal">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner z-depth-1 hoverable" role="listbox">
                                        <!-- First slide -->
                                        @foreach($product->images as $key => $images)
                                        <div class="item {{($key == 0 ? 'active' : '')}}">
                                            {!!Html::image((file_exists('images/products/'.$images->link_imagen) ? 'images/products/'.$images->link_imagen : 'images/no-image.jpg'))!!}
                                        </div>
                                        @endforeach
                                        <!-- /.item -->
                                    </div>
                                    <!-- /.carousel-inner -->
                                </div>
                                <!--/.Main image-->

                                <!-- Indicators -->
                                <div class="col-xs-12" style="position:relative;">
                                    <ul class="carousel-indicators">
                                        @foreach($product->images as $key => $images)
                                        <li data-target="#car-gall" data-slide-to="{{$key}}" class="{{($key == 0 ? 'active' : '')}}">
                                            {!!Html::image((file_exists('images/products/'.$images->link_imagen) ? 'images/products/'.$images->link_imagen : 'images/no-image.jpg'), null, ['class' => 'img-responsive z-depth-1 hoverable'])!!}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Indicators -->
                            </div>
                            <!-- /.carousel -->
                        </div>
                        <!--/.First column: carousel gallery-->

                        <!--Second column: product details-->
                        <div class="col-xs-12 col-sm-6 col-lg-6 descripcion-vista-rapida">
                            <!--Price-->
                            @if($product->quantity > 0)
                            <div class="price">
                                @if(count($product->discounts) > 0)
                                <p class="green-text medium-500">{{cop_format($product->discount_price)}} <span class="discount light-300 black-text">{{cop_format($product->price)}}</span></p>
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


                            @if($product->quantity > 0)
                            {!!Form::open(['route'=>['add.cart',$product->slug],'method'=>'POST'])!!}
                            {!!Form::number('qty', 1, ['class' => 'quantity'])!!}
                            {!!Form::button('<i class="fa fa-shopping-cart"></i> AÑADIR', array('type' => 'submit', 'class'=>'btn btn-tauret  waves-effect waves-light'))!!}
                            {!!Form::close()!!}
                            @else
                            {!!Form::open(['url'=>['notify_product',$product->slug],'method'=>'POST'])!!}
                            {!!Form::hidden('slug', $product->slug)!!}
                            {!!Form::button('<i class="fa fa-mobile"></i> NOTIFICAR', array('type' => 'submit', 'class'=>'btn btn-warning waves-effect waves-light'))!!}
                            {!!Form::close()!!}
                            @endif

                            <hr>
                            <!--Wish list button-->
                            <a href="{{url('add_wishlist/'.$product->slug)}}" class="btn-floating btn-small waves-effect waves-light red darken-4 top-btn" data-toggle="tooltip" data-placement="left" data-original-title="Añadir a Lista de Deseos"><i class="material-icons">favorite</i></a> |
                            <!--Social media-->
                            <a href="{{$product->links['facebook']}}" target="_blank" class="btn-floating btn-small fb-bg waves-effect waves-light"><i class="fa fa-facebook"> </i></a>
                            <a href="{{$product->links['twitter']}}" target="_blank" class="btn-floating btn-small tw-bg waves-effect waves-light"><i class="fa fa-twitter"> </i></a>
                            <a href="{{$product->links['gmail']}}" target="_blank" class="btn-floating btn-small email-bg waves-effect waves-light"><i class="fa fa-envelope-o"> </i></a>
                            <hr>
                        </div>
                        <!--Second column: product details-->

                        <!--Third column: product description-->
                        <div class="col-xs-12 col-sm-12 col-lg-6">
                            <h5>Descripción Corta</h5>
                            <hr>
                            <p>{{$product->subtitle}}</p>
                            <div class="text-center">
                                <a class="btn btn-default btn-lg waves-effect waves-light" href="{{url('product/'.$product->slug)}}">Ver Detalles</a>
                            </div>
                        </div>
                        <!--/.Third column: product description-->
                    </div>
                </div>
            </div>
            <!--/.Product Panel-->
        </div>
        <!-- /.Modal body-->
        <!--Modal footer: close button-->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
        </div>
        <!--/.Modal footer: close button-->
    </div>
    <!-- Modal content-->
</div>
