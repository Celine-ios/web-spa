@extends('user.layout.home')

@section('body')

<div class="container">
    <div class="col-md-8">
    <div class="titulo" style="display:none">

  </div>
        <h4>Lo que has comprado:</h4>
        <!--estados como los de ts y redes que cambie dependiendo el estado-->
        <div class="table-responsive tabla-deseos">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="width:10%">#</th>
                        <th style="width:10%">Fecha</th>
                        <th style="width:15%">Orden</th>
                        <th style="width:15%">Precio</th>
                        <th style="width:15%">Estado</th>
                        <th style="width:25%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{date('Y/m/d', strtotime($order->created_at))}}</td>
                        <td>{{str_pad($order->id, 6, "0", STR_PAD_LEFT)}}</td>
                        <td>{{cop_format($order->total_amount)}}</td>
                        <td>{{ucfirst($order->estado)}}</td>
                        <td style="padding-top:0 !important"><a href="#" class="btn btn-primary pull-left" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> Ver</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('user.profile.product-relacionado')

    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Orden #000000</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive orden-modal">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nombre producto</td>
                                    <td>COP $ 1000000</td>

                                </tr>

                            </tbody>
                            <tfoot>
                                <td></td>
                                <td>Total</td>
                                <td>COP $100000</td>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"> Imprimir</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-4 text-center">
        @include('user.profile.card-profile')
        <div class="banner-patrocinado">
            @include('user.includes.banner-impulso')
        </div>
    </div>




</div>
</div>

@endsection

@include('user.includes.jsmenu')
