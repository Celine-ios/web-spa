<div class="modal-dialog modal-md">

    <!--Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            @if(count($product->discounts) > 0)
            <h4 class="modal-title text-center">{{$product->title}} <span class="label rgba-red-strong">-{{$product->discount_percent}}%</span></h4>
            @else
            <h4 class="modal-title text-center">{{$product->title}}</h4>
            @endif
        </div>
        <!-- Modal body-->
        <div class="modal-body">
            <!--Product Panel-->
            <div class="container">
                <div class="product-panel">
                    <h5>Especificaciones</h5>
                    <div class="col-md-12 texto-tabs">
                        {!!$product->specifications!!}
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
