<div class="modal-dialog modal-lg">
    <div class="modal-content modal-cart">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Configuración de equipo</h4>
        </div>
        <div class="modal-body">
            <table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
                <thead>
                    <th>Cantidad</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-right">Precio Unitario</th>
                    <th class="text-right">IVA Unitario (19%)</th>
                    <th class="text-right">Precio</th>
                </thead>
                <tbody>
                    @foreach($build_products as $product)
                    <tr>
                        <td>{{$product->qty}}</td>
                        <td>{{$product->name}}</td>
                        <td class="text-right">{{cop_format($product->price - $product->options->tax)}}</td>
                        <td class="text-right">{{cop_format($product->options->tax)}}</td>
                        <td class="text-right">{{cop_format($product->price * $product->qty)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <ul class="collection" style="height: auto;">
                <li class="collection-item total" style="background:whitesmoke !important; padding-top: 10px;padding-bottom: 10px;">
                    <h5 style="color: gray;">Subtotal:  <span class="label total pull-right">{{cop_format(ceil($build_amount - $tax_build))}}</span></h5>
                </li>
                <li class="collection-item total" style="background:whitesmoke !important;border-top: solid 1px gray;box-shadow: none;padding-bottom: 10px;">
                    <h5>IVA (19%):  <span class="label total pull-right">{{cop_format(ceil($tax_build))}}</span></h5>
                </li>
                <li class="collection-item total">
                    <h5 style="color:white !important;">Total:  <span class="label total pull-right" style="color:white !important">{{cop_format(ceil($build_amount))}}</span></h5>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <a href="{{url('print/imprimir')}}" class="btn btn-primary waves-effect waves-light" style="margin-top:19px;">
                <i class="fa fa-print" aria-hidden="true"></i>
            </a>
            <a href="{{url('add_custom/guardar')}}" class="btn btn-warning waves-effect waves-light">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
            </a>
            <a href="{{url('add_custom/comprar')}}" class="btn btn-tauret waves-effect waves-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Comprar
            </a>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
