@if(Route::current()->getURI() !== 'view_cart' && count($cart_list) > 0)
<div class="fixed-action-btn" id="btn-cart" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large btn-tauret" data-toggle="modal" data-target="#cart-modal">
        <i class="fa fa-shopping-cart"></i><span>Cart</span> </a><span class="badge social-counter">{{$cart_list->count()}}</span>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="cart-modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-cart">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Carrito de Compras</h5>
            </div>
            <div class="modal-body">
                <table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
                    <thead>
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Precio Unitario</th>
                        <th>Precio</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($cart_list as $product)
                        <tr>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{cop_format($product->price + $product->tax)}}</td>
                            <td>{{cop_format(round(($product->price * $product->qty) + ($product->tax * $product->qty)))}}</td>
                            <td><a href="{{url('remove_cart/'.$product->rowId)}}" class="secondary-content"><i class="material-icons">close</i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <ul class="collection">
                    <li class="collection-item total">
                        <h5>Total  <span class="label total">{{cop_format(round($cart_price))}}</span></h5>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="{{url('view_cart')}}" class="btn btn-tauret btn-small pull-right"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Pagar Cart</a>
            </div>
        </div>
    </div>
</div>

@section('add_js')
{{Html::script('/js/forms.js')}}
{{Html::script('/js/cart.js')}}
{{Html::script('https://apis.google.com/js/api:client.js')}}
{{Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfgqIoM2rtSqfTQIEpugy6t3qJBD07vI&libraries=places&callback=initAutocomplete', ['async','defer'])}}
@endsection
<!-- Modal -->
@endif
