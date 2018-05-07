<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="height: 100%;margin: 0;padding: 0;width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: white; color:#FFF0F5">
    <center>
        <table border="0" cellpadding="0" cellspacing="0" class="mcnCodeBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%; border-style: solid;  border-size: 2px; width: 100%">
            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                <td class="container" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; width:60% !important; clear: both !important; margin: 0 auto;" valign="top">
                    <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 100%; display: block; margin: 0 auto; padding: 20px;">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: 1px solid #e9e9e9; background:whitesmoke;">
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="alert alert-warning" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; margin: 0; padding: 20px;" align="center" valign="top">
                                    <img src="http://new.tauretcomputadores.com/images/logonegro.png" height="150" />
                                </td>
                            </tr>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="9" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif; box-sizing: border-box; font-size: 16px; line-height: 1.2em; font-weight: 500; text-align: center; margin: 40px 0 0; text-align:center; color:black" valign="top">
                                                <h1 class="aligncenter" align="center">Orden de Pedido</h1>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td></td>
                                            <td class="content-block" colspan="2" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0;text-align: center; color:black;" valign="top">
                                                @if(isset($aprobacion))
                                                <p>Se ha realizado la aprobación de su orden, contiene los siguientes datos:</p>
                                                @else
                                                <p>Se ha creado una orden, tiene los siguientes datos:</p>
                                                @endif
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td></td>
                                            <td class="content-block aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" colspan="2">
                                                <table class="invoice" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;color:black;">
                                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
                                                            {{$orden->shipping_order->apellidos.' '.$orden->shipping_order->nombres}}
                                                            <br><strong>Orden #</strong> {{str_pad($orden->id, 6, "0", STR_PAD_LEFT)}}
                                                            <br><strong>Dirección:</strong>
                                                            {{$orden->shipping_order->direccion}}  {{($orden->shipping_order->direccion_2 ? $orden->shipping_order->direccion_2 : '')}}
                                                            <br><strong>Ciudad:</strong>
                                                            {{$orden->shipping_order->ciudad}}
                                                            <br><strong>Teléfono:</strong>{{$orden->shipping_order->telefono}}  {{($orden->shipping_order->telefono_2 ? '-'.$orden->shipping_order->telefono_2 : '')}}
                                                            <br>Creada el: {{date('Y-m-d H:i:s')}}
                                                        </td>
                                                    </tr>
                                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
                                                            <table class="invoice-items" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">
                                                                <tr>
                                                                    <th style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Producto</th>
                                                                    <th style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Cant.</th>
                                                                    <th style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Valor</th>
                                                                </tr>
                                                                @foreach($orden->products as $product)
                                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">{{$product->title}}
                                                                    </td>
                                                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">{{$product->pivot->units}}
                                                                    </td>
                                                                    <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">COP ${{number_format($product->pivot->units * $product->pivot->unit_price)}}</td>
                                                                </tr>
                                                                @endforeach
                                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                    <th colspan="2" class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 17px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"valign="top">
                                                                        Total
                                                                    </th>
                                                                    <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top"> COP ${{number_format(round($total_amount))}}</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <!-- Si la orden es contraentrega -->
                                        @if($orden->tipo_pago == 'contraentrega')
                                        <tr style="width:90%; margin: 0 auto; color:black; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px;wi margin: 0;">
                                            <td></td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">

                                                Recuerde que si su orden es de contraentrega, debe cancelar el total del servicio cuando se le sea entregado.
                                            </td>
                                            <td></td>
                                        </tr>
                                        <!-- Si la orden es pago en línea -->
                                        @elseif($orden->tipo_pago == 'contraentrega')
                                        <tr style="width:90%; margin: 0 auto; color:black; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td></td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Recuerde que si su orden es de pago online, se le será notificado cuando la transacción sea aprobada en el sistema de pagos.
                                            </td>
                                        </tr>
                                        @endif
                                        <tr style="width:90%; margin: 0 auto; color:black; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td></td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Éste correo no reemplaza a la factura original.
                                            </td>
                                        </tr>
                                        <!-- endif-->
                                        <tr style="width:90%; margin: 0 auto; color:black; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td></td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Gracias por preferirnos.
                                            </td>
                                        </tr>

                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td></td>
                                            <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <center>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <a href="https://www.facebook.com/Tauretcomputadores" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/dark-facebook-96.png" alt="Facebook"  width="48" style="width: 48px;max-width: 48px;display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a>
                                                            </td>
                                                            <td>
                                                                <a href="https://twitter.com/Tauretunilago" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/dark-twitter-96.png" alt="Twitter" class="mcnFollowBlockIcon" width="48" style="width: 48px;max-width: 48px;display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a>
                                                            </td>
                                                            <td>
                                                                <a href="https://www.instagram.com/tauretcomputadores/" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/dark-instagram-96.png" alt="Instagram" class="mcnFollowBlockIcon" width="48" style="width: 48px;max-width: 48px;display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a>
                                                            </td>
                                                            <td>
                                                                <a href="https://www.youtube.com/channel/UCHI0wLTjbNooLEpbTnGyByw" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/dark-youtube-96.png" alt="YouTube" class="mcnFollowBlockIcon" width="48" style="width: 48px;max-width: 48px;display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a>
                                                            </td>
                                                            <td>
                                                                <a href="https://plus.google.com/+TauretUnilago/posts" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/dark-googleplus-96.png" alt="Google Plus" class="mcnFollowBlockIcon" width="48" style="width: 48px;max-width: 48px;display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a>
                                                            </td>
                                                            <td>
                                                                <a href="http://www.tauretcomputadores.com" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/dark-link-96.png" alt="Website" class="mcnFollowBlockIcon" width="48" style="width: 48px;max-width: 48px;display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a>
                                                            </td>
                                                            <td>
                                                                <a href="mailto:ventas@tauretcomputadores.com" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/dark-forwardtofriend-96.png" alt="Email" class="mcnFollowBlockIcon" width="48" style="width: 48px;max-width: 48px;display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div class="footer" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
                            <table width="100%" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; color:gray;">
                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="aligncenter content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">Copyright &copy; 2017 Tauret Computadores S.A.S., Todos los derechos reservados.</td>
                                </tr>
                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td>
                                        <span style="font-family:helvetica; font-size:11px; line-height:13.75px; color:#5a5a5a;">Este correo no es SPAM usted recibe este correo al estar en la base de datos de Tauret Computadores S.A.S. De acuerdo a la ley estatutaria 1581 de 2012 Reglamentada parcialmente por el Decreto Nacional 1377 de 2013 para la protección de datos personales, usted puede darse de baja de nuestra base de datos en cualquier momento. Tauret Computadores es una marca registrada propiedad de Tauret Computadores S.A.S.</span>
                                    </td>
                                </tr>
                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td>
                                        <strong style="color: #606060;font-family: helvetica;font-size: 11px;line-height: 13.75px;">Nuestra dirección:</strong><br>
                                        <div class="vcard" style="color: #606060;font-family: Helvetica;font-size: 11px;line-height: 13.75px;">
                                            <div style="text-align: left;"><span style="color:#5a5a5a"><span class="fn org">Tauret Computadores S.A.S.</span></span></div>

                                            <div class="adr">
                                                <div class="street-address" style="text-align: left;"><span style="color:#5a5a5a">Carrera 15 # 78 - 33 Local 2-319 / 2-275 / 2-274 Centro Comercial Unilago.</span></div>

                                                <div style="text-align: left;"><span style="color:#5a5a5a"><span class="locality">Bogotá</span>&nbsp;<span class="postal-code">11001000</span></span></div>

                                                <div class="country-name" style="text-align: left;"><span style="color:#5a5a5a">Colombia</span></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
