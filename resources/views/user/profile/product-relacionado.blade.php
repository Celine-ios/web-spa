<h4>Productos para tí:</h4>
<div class="owl-carousel" id="productos-lista">

    <!-- Si el prodcuto esta en la lista selecionalos y muestralos aquí-->
    @foreach($related as $prelated)
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
                    {!!Html::image((file_exists('images/products/'.$prelated->image) ? 'images/products/'.$prelated->image : 'images/no-image.jpg'))!!}
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
