@extends('user.layout.home')

@section('body')
<div class="slider-full">


</div>
<section class="blanco">
  <div class="titulo" style="display:none">

  </div>
    <div class="container">
        <div class="TC-article col-md-12">
            <h5 style="text-align: center;">INFORMACIÓN DE PAGO:</h5>
            <hr>

 <p>A continuación resolvemos las dudas más comunes sobre las formas de pago, tenga presente que
nos caracterizamos por brindar una asesoría personal y de calidad, si tiene alguna duda, o se le
presento algún inconveniente, no dude en contactarnos siempre estamos dispuestos a solucionar y
acompañar a nuestros clientes en todo momento.</p>
 
<p>¿Cuales son los medios de pago que puedo utilizar por la Tienda OnLine? : Se puede pagar con
tarjetas de crédito Visa - Mastercard - American Express - Dinners Club - Codensa también puede
realizar el pago en efectivo en los puntos de Via-Baloto ó Efecty, y débito a través de su cuenta
bancaria de ahorros o corriente.</p>
<p>¿Quien verifica los pagos en linea, es seguro? : Administramos nuestros pagos en linea a través de
Mercadopago quien cuenta con todos los certificados de seguridad exigidos por ley para obtener
más información de PayuLatam ingrese acá: https://www.mercadopago.com.co/
¿Una vez cancelado, que tiempo de espera tiene la confirmación?: El sistema enviara un correo de
transacción aprobada o rechazada en un termino de máximo dos horas, depende el nivel de tráfico
en el que se encuentre la plataforma en días especiales o promociones ese tiempo puede varias
significativamente.</p>
<p>Ya cancele y no me llega ningún correo ¿Qué hago? : Si pasadas el máximo de dos horas de
espera aún no recibe información de su transacción puede ingresar a este link:
https://www.mercadopago.com.co/ayuda o comunicarse con nosotros para brindarle asesoría
Mi transacción ha sido rechazada ¿por qué? : Las transacciones rechazadas no permiten
especificar el motivo del rechazo, revise que toda la información se encuentre escrita
correctamente para obtener el motivo de rechazo debe dirigirse a su entidad bancaria
correspondiente.</p>
<p>Mi transacción fue rechazada, sin embargo me fue debitada en mi tarjeta crédito y/o débito ¿Qué
debo hacer? : Es posible que se haya presentado un problema de comunicación con las entidades
financieras y que la transacción quede en un estado rechazado o con error a pesar de que el
dinero haya sido debitado. Por favor escale el caso con la página de ayuda de mercadopago
https://www.mercadopago.com.co/ayuda para realizar el ajuste en el sistema y solicitar la anulación
de la transacción a las entidades financieras. La devolución del dinero puede tardar hasta 30 días
hábiles dependiendo del medio de pago que utilizo</p>

        </div>
    </div>
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
