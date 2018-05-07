@extends('user.layout.home')
@section('body')
    <section class="blanco">
<div class="titulo" style="display:none"></div>
        <div class="container">
            <h4 class="modal-title">Carrito de Compras</h4>
            <div class="col-md-8 col-md-offset-2">
                <table id="datatable" class="table-condensed panel" role="grid" aria-describedby="datatable_info">
                    <thead style="background-color:whitesmoke; text-align:center;">
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Precio Unitario</th>
                        <th>IVA (19%)</th>
                        <th>Precio</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($cart_list as $product)
                            <tr>
                                <td>{{$product->qty}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{cop_format($product->price - $product->tax)}}</td>
                                <td>{{cop_format($product->tax)}}</td>
                                <td>{{cop_format($product->price * $product->qty)}}</td>
                                <td><a href="{{url('remove_cart/'.$product->rowId)}}" class="secondary-content"><i class="material-icons">close</i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <hr>
                </table>

                <ul class="collection" style="height: auto;">
                    <li class="collection-item total">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-3 pagos text-right">
                            Subtotal:
                        </div>
                        <div class="col-md-3 pagos text-right">
                            {{cop_format(ceil($cart_price - $tax_all))}}
                        </div>

                    </li>
                    <li class="collection-item total">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-3 pagos">
IVA (19%):
                        </div>
                        <div class="col-md-3 pagos">
{{cop_format(ceil($tax_all))}}
                        </div>

                    </li>
                    <li class="collection-item total">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-3 pagos">
                          Total:
                        </div>
                        <div class="col-md-3 pagos">
                          {{cop_format(ceil($cart_price))}}
                        </div>
                    </li>
                </ul>
            </div>



            {!!Form::model(Auth::guard('user')->user(), ['url'=> 'pay_cart','method'=>'POST', 'novalidate', 'id' => 'pay','name'=>'pay'])!!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="x_content"></div>
                    <h5 class="text-center">Confirmar el Pago</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 panel">
                    <h5 class="text-center">Datos del Comprador</h5>

                    <div class="form-group {{ $errors->has('dni') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::text('dni', null, ['class'=>'form-control', 'placeholder' => 'Inserte Documento de Identidad', 'required', 'id' => 'dni'])!!}
                        <span class="label label-danger">{{$errors->first('dni') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('nombres') ? ' has-error' : '' }} col-sm-6">
                        <input type="text" name="nombres" class="form-control" placeholder="Inserte Nombres" required="" id="nombres"  @if(Auth::guard('user')->user()) value="{{Auth::guard('user')->user()->first_name}}" @endif>
                        <span class="label label-danger">{{$errors->first('nombres') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('apellidos') ? ' has-error' : '' }} col-sm-6">
                        <input type="text" name="apellidos" class="form-control" placeholder="Inserte apellidos" required="" id="apellidos"  @if(Auth::guard('user')->user()) value="{{Auth::guard('user')->user()->last_name}}" @endif>
                        <span class="label label-danger">{{$errors->first('apellidos') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('ciudad') ? ' has-error' : '' }} col-sm-6">
                        <input type="text" name="ciudad" class="form-control" placeholder="Inserte ciudad" required="" id="city"  @if(Auth::guard('user')->user()) value="{{Auth::guard('user')->user()->city}}" @endif>
                        <span class="label label-danger">{{$errors->first('ciudad') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-sm-6">
                        {!!Form::email('email', null, ['class'=>'form-control', 'placeholder' => 'Inserte Correo Electrónico', 'required'])!!}
                        <span class="label label-danger">{{$errors->first('email') }}</span>
                    </div>


                    <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::text('direccion', null, ['class'=>'form-control', 'placeholder' => 'Inserte Dirección Principal', 'required'])!!}
                        <span class="label label-danger">{{$errors->first('direccion') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('direccion_2') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::text('direccion_2', null, ['class'=>'form-control', 'placeholder' => 'Inserte Dirección Secundaria'])!!}
                        <span class="label label-danger">{{$errors->first('direccion_2') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('telefono') ? ' has-error' : '' }} col-sm-6">
                        {!!Form::number('telefono', null, ['class'=>'form-control', 'placeholder' => 'Inserte Teléfono Principal', 'required'])!!}
                        <span class="label label-danger">{{$errors->first('telefono') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('telefono_2') ? ' has-error' : '' }} col-sm-6">
                        {!!Form::number('telefono_2', null, ['class'=>'form-control', 'placeholder' => 'Inserte Teléfono Secundario'])!!}
                        <span class="label label-danger">{{$errors->first('telefono_2') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }} col-sm-12">
                        {!!Form::number('fax', null, ['class'=>'form-control', 'placeholder' => 'Inserte Fax'])!!}
                        <span class="label label-danger">{{$errors->first('fax') }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h5 class="text-center">Datos de Pago</h5>
                    <div class="row">
                        <div class="form-group {{ $errors->has('payment_type') ? ' has-error' : '' }} col-sm-12">
                            {!!Form::select('payment_type', $metodosPago, null, ['class' => 'browser-default form-control', 'placeholder' => 'Seleccione un Tipo de Pago', 'required', 'id' => 'payment_type'])!!}
                            <span class="label label-danger">{{$errors->first('payment_type') }}</span>
                        </div>
                    </div>
                    <div class="row credit_card hidden">
                        <div class="form-group col-sm-12">
                            <label for="cardNumber" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de tarjeta de credito:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cardNumber" name="cardNumber" class="form-control col-md-7 col-xs-12" data-checkout="cardNumber"  required/>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="securityCode" class="control-label col-md-3 col-sm-3 col-xs-12">Codigo de seguridad:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="securityCode" name="securityCode" data-checkout="securityCode"  class="form-control col-md-7 col-xs-12" required="" />
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="cardExpirationMonth" class="control-label col-md-3 col-sm-3 col-xs-12">mes de Expiración:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cardExpirationMonth" name="cardExpirationMonth" data-checkout="cardExpirationMonth"  class="form-control col-md-7 col-xs-12" required=""/>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="cardExpirationYear" class="control-label col-md-3 col-sm-3 col-xs-12">Año de expiración:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cardExpirationYear" name="cardExpirationYear" data-checkout="cardExpirationYear" class="form-control col-md-7 col-xs-12" required="" />
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="cardholderName" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre en la tarjeta:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cardholderName" name="cardholderName" data-checkout="cardholderName"  class="form-control col-md-7 col-xs-12" required="" />
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label">Tarjeta de credito<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="paymentMethodId" id="paymentMethodId" class="form-control col-md-7 col-xs-12" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="docType" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de documento:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="docType" name="docType" data-checkout="docType" class="form-control col-md-7 col-xs-12" required="">
                                    <option value="0">CC</option><option value="1">CE</option><option value="2">NIT</option><option value="3">Pasaporte</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="docNumber" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de documento:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="docNumber" name="docNumber" data-checkout="docNumber" class="form-control col-md-7 col-xs-12" required=""/>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label">Numero de cuotas<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group" id="nomames">

                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="amount" name="amount" value="{{ceil($cart_price)}}" />
                        <select id="issuer" name="issuer" hidden="hidden"></select>
                    </div>

                    <div class="row others hidden">
                        <div class="form-group {{ $errors->has('cardholder_identification_type') ? ' has-error' : '' }} col-sm-3">
                            {!!Form::select('cardholder_identification_type', ['CC', 'CE', 'NIT', 'Pasaporte'], null, ['class' => 'browser-default form-control', 'required', 'id' => 'cardholder_identification_type'])!!}
                            <span class="label label-danger">{{$errors->first('cardholder_identification_type') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('cardholder_identification_number') ? ' has-error' : '' }} col-sm-9">
                            {!!Form::text('cardholder_identification_number', null, ['class'=>'form-control', 'placeholder' => 'Inserte Documento de Identidad', 'required', 'id' => 'cardholder_identification_number'])!!}
                            <span class="label label-danger">{{$errors->first('cardholder_identification_number') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('cardholder_name') ? ' has-error' : '' }} col-sm-12">
                            {!!Form::text('cardholder_name', null, ['class'=>'form-control', 'placeholder' => 'Inserte Nombre Completo', 'required', 'id' => 'cardholder_name'])!!}
                            <span class="label label-danger">{{$errors->first('cardholder_name') }}</span>
                        </div>

                        <div class="form-group col-md-12 hidden" id="bancos" >
                            <label class="col-sm-3 control-label">Entidad bancaria<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <select class="" name="banco"  required="" id="banco">
                                        @foreach($payment_methods['response'] as $result)
                                            @if($result['id'] =="pse")
                                                @foreach($result['financial_institutions'] as $banks)
                                                    <option value="{{$banks['id']}}">{{$banks['description']}}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pse hidden">

                    </div>

                    <div class="row">

                    </div>
                    <div class="row hidden" id="hacerpago">
                        <div class="col-sm-12">
                            {!!Form::checkbox('terms', null, true, ['id' => 'terms', 'required'])!!}
                            <label for="terms">
                                <a href="{{url('terminos')}}" target="_blank">Por favor lea y acepte los términos de servicio.</a>
                            </label>
                            <span class="label label-danger">{{$errors->first('terms') }}</span>
                        </div>

                        <div class="col-sm-12">
                            <ul class="collection">
                                <li class="collection-item total">
                                    <h5>Total (IVA incluido):  <span class="label total pull-right">{{cop_format($cart_price)}}</span></h5>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-sm-offset-6">
                            <div class="x_content"></div>
                            {!!Form::button('Pagar', ['type' => 'submit', 'class'=>'btn btn-success btn-block btn-lg'])!!}
                        </div>
                    </div>
                </div>
            </div>
            
            {!!Form::close()!!}
        </div>

        <div class="modal fade" id="pleaseWaitDialog" role="dialog">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h1><i class="fa fa-spinner fa-spin"></i> Cargando...</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    {{Html::script('/js/forms.js')}}
    {{Html::script('/js/cart.js')}}
    {{Html::script('https://apis.google.com/js/api:client.js')}}
    {{Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfgqIoM2rtSqfTQIEpugy6t3qJBD07vI&libraries=places&callback=initAutocomplete', ['async','defer'])}}
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

    <script type="text/javascript">
    $(document).ready(function()
    {
        $("#nomames").append('<select id="installments" class="form-control" style="    display: initial!important;" name="installments" required></select>')
        method = $('#payment_type').val();
        if (method.length > 0) {
            myApp.showPleaseWait();

            if (method == 'tarjeta_credito')
            {
                $('.credit_card').removeClass('hidden');
                $('.others').addClass('hidden');
$("#hacerpago").removeClass('hidden');
            }
            else if(method == 'pse')
            {
                $('.others').removeClass('hidden');
                $('#bancos').removeClass('hidden');
                $('.credit_card').addClass('hidden');
$("#hacerpago").removeClass('hidden');
            }
            else
            {
                $('#bancos').addClass('hidden');
                $('.credit_card').addClass('hidden');
                $('.others').removeClass('hidden');
$("#hacerpago").removeClass('hidden');
            }
            myApp.hidePleaseWait();
        }
    });

    var otra = $('.global-menu').offset().top;
    $(window).on('scroll', function(){
        if ( $(window).scrollTop() > otra ){
            $('#MenuCategoria').css("display","");

        } else {
            $('#MenuCategoria').css("display","");
        }
    });

    $('#payment_type').change(function(e) {
        method = $(this).val();
        method = $('#payment_type').val();
        if (method.length > 0) {
            myApp.showPleaseWait();

            if (method == 'tarjeta_credito')
            {
                $('.credit_card').removeClass('hidden');
                $('.others').addClass('hidden');
                $("#hacerpago").removeClass('hidden');
            }
            else if(method == 'pse')
            {
                $('.others').removeClass('hidden');
                $('#bancos').removeClass('hidden');
                $('.credit_card').addClass('hidden');
                $("#hacerpago").removeClass('hidden');
            }
            else
            {
                $('#bancos').addClass('hidden');
                $('.credit_card').addClass('hidden');
                $('.others').removeClass('hidden');
                $("#hacerpago").removeClass('hidden');
            }
            myApp.hidePleaseWait();
        }
        else
        {
            $('.credit_card').addClass('hidden');
            $('.others').addClass('hidden');
            $("#hacerpago").addClass('hidden');
        }
    });

    $('#dni').keyup(function(e) {
        dni = $(this).val();
        $('#cardholder_identification_number').val(dni);
    });

    $('#nombres').keyup(function(e) {
        nombres    = $(this).val();
        apellidos  = $('#apellidos').val();
        cardholder = nombres.trim()+' '+apellidos.trim();

        $('#cardholder_name').val(cardholder);
    });

    $('#apellidos').keyup(function(e) {
        nombres    = $('#nombres').val();
        apellidos  = $(this).val();
        cardholder = nombres.trim()+' '+apellidos.trim();

        $('#cardholder_name').val(cardholder);
    });
@if(Auth::guard('user')->user())
    jQuery(document).ready(function($) {
        
        nombres    = $('#nombres').val();
        apellidos  = $('#apellidos').val();
        cardholder = nombres.trim()+' '+apellidos.trim();

        $('#cardholder_name').val(cardholder);

    });

@endif
    var myApp;
    myApp = myApp || (function () {
        var pleaseWaitDiv = $('#pleaseWaitDialog');
        return {
            showPleaseWait: function() {
                pleaseWaitDiv.modal();
            },
            hidePleaseWait: function () {
                pleaseWaitDiv.modal('hide');
            },

        };
    })();

    Mercadopago.setPublishableKey("APP_USR-c993ef76-f926-419b-b666-57447bdb8a70");
    Mercadopago.getIdentificationTypes();

    function addEvent(el, eventName, handler){
        if (el.addEventListener) {
            el.addEventListener(eventName, handler);
        } else {
            el.attachEvent('on' + eventName, function(){
                handler.call(el);
            });
        }
    };

    function getBin() {
        var ccNumber = document.querySelector('input[data-checkout="cardNumber"]');
        return ccNumber.value.replace(/[ .-]/g, '').slice(0, 6);
    };

    function guessingPaymentMethod(event) {
        var bin = getBin();

        if (event.type == "keyup") {
            if (bin.length >= 6) {
                Mercadopago.getPaymentMethod({
                    "bin": bin
                }, setPaymentMethodInfo);
            }
        } else {
            setTimeout(function() {
                if (bin.length >= 6) {
                    Mercadopago.getPaymentMethod({
                        "bin": bin
                    }, setPaymentMethodInfo);
                }
            }, 100);
        }
    };

    function setPaymentMethodInfo(status, response) {
        if (status == 200) {
            // do somethings ex: show logo of the payment method
            var form = document.querySelector('#pay');

            if (document.querySelector("input[name=paymentMethodId]") == null) {
                var paymentMethod = document.createElement('input');
                paymentMethod.setAttribute('name', "paymentMethodId");
                paymentMethod.setAttribute('type', "hidden");
                paymentMethod.setAttribute('value', response[0].id);

                form.appendChild(paymentMethod);
            } else {
                document.querySelector("input[name=paymentMethodId]").value = response[0].id;
            }
        }
    };

    addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'keyup', guessingPaymentMethod);
    addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'change', guessingPaymentMethod);

    doSubmit = false;
    addEvent(document.querySelector('#pay'),'submit',doPay);
    function doPay(event){
        event.preventDefault();
        if(!doSubmit){
            var $form = document.querySelector('#pay');

            Mercadopago.createToken($form, sdkResponseHandler); // The function "sdkResponseHandler" is defined below

            return false;
        }
    };
    function getBin() {
        var cardSelector = document.querySelector("#cardId");
        if (cardSelector && cardSelector[cardSelector.options.selectedIndex].value != "-1") {
            return cardSelector[cardSelector.options.selectedIndex].getAttribute('first_six_digits');
        }
        var ccNumber = document.querySelector('input[data-checkout="cardNumber"]');
        return ccNumber.value.replace(/[ .-]/g, '').slice(0, 6);
    }

    function clearOptions() {
        var bin = getBin();
        if (bin.length == 0) {
            document.querySelector("#issuer").style.display = 'none';
            document.querySelector("#issuer").innerHTML = "";

            var selectorInstallments = document.querySelector("#installments"),
            fragment = document.createDocumentFragment(),
            option = new Option("Seleccione...", '-1');

            selectorInstallments.options.length = 0;
            fragment.appendChild(option);
            selectorInstallments.appendChild(fragment);
            selectorInstallments.setAttribute('disabled', 'disabled');
        }
    }

    function guessingPaymentMethod(event) {
        var bin = getBin(),
        amount = document.querySelector('#amount').value;
        if (event.type == "keyup") {
            if (bin.length == 6) {
                Mercadopago.getPaymentMethod({
                    "bin": bin
                }, setPaymentMethodInfo);
            }
        } else {
            setTimeout(function() {
                if (bin.length >= 6) {
                    Mercadopago.getPaymentMethod({
                        "bin": bin
                    }, setPaymentMethodInfo);
                }
            }, 100);
        }
    };

    function setPaymentMethodInfo(status, response) {
        if (status == 200) {
            // do somethings ex: show logo of the payment method
            var form = document.querySelector('#pay');

            if (document.querySelector("input[name=paymentMethodId]") == null) {
                var paymentMethod = document.createElement('input');
                paymentMethod.setAttribute('name', "paymentMethodId");
                paymentMethod.setAttribute('type', "hidden");
                paymentMethod.setAttribute('value', response[0].id);
                form.appendChild(paymentMethod);
            } else {
                document.querySelector("input[name=paymentMethodId]").value = response[0].id;
            }

            // check if the security code (ex: Tarshop) is required
            var cardConfiguration = response[0].settings,
            bin = getBin(),
            amount = document.querySelector('#amount').value;

            for (var index = 0; index < cardConfiguration.length; index++) {
                if (bin.match(cardConfiguration[index].bin.pattern) != null && cardConfiguration[index].security_code.length == 0) {
                    /*
                    * In this case you do not need the Security code. You can hide the input.
                    */
                } else {
                    /*
                    * In this case you NEED the Security code. You MUST show the input.
                    */
                }
            }

            Mercadopago.getInstallments({
                "bin": bin,
                "amount": amount
            }, setInstallmentInfo);

            // check if the issuer is necessary to pay
            var issuerMandatory = false,
            additionalInfo = response[0].additional_info_needed;

            for (var i = 0; i < additionalInfo.length; i++) {
                if (additionalInfo[i] == "issuer_id") {
                    issuerMandatory = true;
                }
            };
            if (issuerMandatory) {
                Mercadopago.getIssuers(response[0].id, showCardIssuers);
                addEvent(document.querySelector('#issuer'), 'change', setInstallmentsByIssuerId);
            } else {
                document.querySelector("#issuer").style.display = 'none';
                document.querySelector("#issuer").options.length = 0;
            }
        }
    };

    function showCardIssuers(status, issuers) {
        var issuersSelector = document.querySelector("#issuer"),
        fragment = document.createDocumentFragment();

        issuersSelector.options.length = 0;
        var option = new Option("Seleccione...", '-1');
        fragment.appendChild(option);

        for (var i = 0; i < issuers.length; i++) {
            if (issuers[i].name != "default") {
                option = new Option(issuers[i].name, issuers[i].id);
            } else {
                option = new Option("Otro", issuers[i].id);
            }
            fragment.appendChild(option);
        }
        issuersSelector.appendChild(fragment);
        issuersSelector.removeAttribute('disabled');
        document.querySelector("#issuer").removeAttribute('style');
    };

    function setInstallmentsByIssuerId(status, response) {
        var issuerId = document.querySelector('#issuer').value,
        amount = document.querySelector('#amount').value;

        if (issuerId === '-1') {
            return;
        }

        Mercadopago.getInstallments({
            "bin": getBin(),
            "amount": amount,
            "issuer_id": issuerId
        }, setInstallmentInfo);
    };

    function setInstallmentInfo(status, response) {
        var selectorInstallments = document.querySelector("#installments"),
        fragment = document.createDocumentFragment();

        selectorInstallments.options.length = 0;

        if (response.length > 0) {
            var option = new Option("Seleccione...", '-1'),
            payerCosts = response[0].payer_costs;

            fragment.appendChild(option);
            for (var i = 0; i < payerCosts.length; i++) {
                option = new Option(payerCosts[i].recommended_message || payerCosts[i].installments, payerCosts[i].installments);
                fragment.appendChild(option);
            }
            selectorInstallments.appendChild(fragment);
            selectorInstallments.removeAttribute('disabled');
        }
    };

    function cardsHandler() {
        clearOptions();
        var cardSelector = document.querySelector("#cardId"),
        amount = document.querySelector('#amount').value;

        if (cardSelector && cardSelector[cardSelector.options.selectedIndex].value != "-1") {
            var _bin = cardSelector[cardSelector.options.selectedIndex].getAttribute("first_six_digits");
            Mercadopago.getPaymentMethod({
                "bin": _bin
            }, setPaymentMethodInfo);
        }
    }

    addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'keyup', guessingPaymentMethod);
    addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'keyup', clearOptions);
    addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'change', guessingPaymentMethod);
    cardsHandler();
    function sdkResponseHandler(status, response)
    {
        if (status != 200 && status != 201)
        {
            alert("Error en la verificación de datos ");
        }
        else
        {

            var form = document.querySelector('#pay');

            var card = document.createElement('input');
            card.setAttribute('name',"token");
            card.setAttribute('type',"hidden");
            card.setAttribute('value',response.id);
            form.appendChild(card);
            doSubmit=true;
            form.submit();
        }
    };

    </script>
@endsection
