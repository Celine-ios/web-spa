@extends('user.layout.home')

@section('body')
<div class="slider-full">


</div>
<section class="blanco">
  <div class="titulo" style="display:none">

  </div>
    <div class="container">
        <div class="TC-article col-md-12">
            <h5 style="text-align: center;">INFORMACIÓN SOBRE EL ENVÍO:</h5>
            <hr>
            <p>A continuación resolvemos las dudas más comunes sobre el envío de la mercancía, tenga presente que nos caracterizamos por brindar una asesoría personal y de calidad, si tiene alguna duda, o se le presento algún inconveniente, no dude en contactarnos siempre estamos dispuestos a solucionar y acompañar a nuestros clientes en todo momento.</p>
            <ol>

<li>  ¿Por dónde me envían la mercancía?:Los envíos de mercancía se realizan a través de las siguientes empresas: SERVIENTREGA – TCC- ENVIA – INTERRAPIDISIMO – DEPRISA – COORDINADORA En el momento de realizar la compra On-Line el sistema le permite escoger la transportadora de su preferencia, recuerde que el costo del envío está incluido en el precios que se cancela, sin embargo es posible que por factores externos y en prioridad de realizar el envío lo más rápido posible Tauret Computadores S.A.S. tome la determinación de enviarlo por el servicio que se encuentre disponible en ese momento.</li></li>

<li>  ¿Viaja la mercancía asegurada?:La mercancía es asegurada por el valor de la compra.</li>

<li>  ¿Qué pasa si se pierde mi mercancía en la transportadora?:el cliente asume la responsabilidad de  reclamación ante la transportadora en caso de pérdida referenciado esto en el Código de Comercio en el Capítulo I Artículo 994. Tauret Computadores SAS solo es responsable hasta el momento en que el producto es entregado a la transportadora, pasando a esta, la responsabilidad según el Código de Comercio Título IV del contrato de transporte Capítulo III "Transporte de Cosas" Artículo 1013 "Entrega de Mercancías y Responsabilidad del Transportador" y Artículo 1030 "Responsabilidad por pérdida total o parcial de la cosa".</li>

<li> ¿Qué pasa si llega mi producto y está defectuoso o por garantía?:Tauret Computadores SAS asumirá totalmente los costos por devolución de un producto defectuoso de acuerdo con los términos y condiciones de garantía únicamente dentro de los primeros 3 (Tres) días después de recibida la mercancía, una vez pasados estos tres días el valor de ambos fletes para devolución de un producto de garantía será asumido en su totalidad por el cliente, para saber el tiempo de garantía de cada producto visite la sección de Garantía.</li>

<li> ¿Cómo sé que ya enviaron mi producto?: Una vez confirmado el pago por el sistema, y realizado el envío enviaremos a su correo electrónico el número de guía y el nombre de la transportadora para que pueda rastrear el envío a través de la página web de la transportadora.</li>

<li> No ha llegado mi mercancía aún ¿Qué hago?: El primer paso a seguir es rastrear la mercancía en la página de la transportadora con el número de guía suministrado, tener en cuenta que el envío puede demorar de 1 a 3 días hábiles en cualquier transportadora dependiendo del estado de la carretera u otros factores que pueden afectar el transporte terrestre o aéreo, Segundo comunicarse con la transportadora al PBX que suministran en la página web de la misma para obtener una respuesta verbal, tercero si en la transportadora no localizan el paquete es responsabilidad del cliente generar la respectiva reclamación ante la transportadora para hacer valido el seguro de transporte de la mercancía. Tauret Computadores SAS no responde por demoras en la entrega del producto una vez puesto en la transportadora estas son responsabilidad del tercero el cuál presta el servicio.</li>

<li> El producto que pedí no es el que solicite: TauretComputadores SAS asumirá totalmente los costos por devolución de un producto mal enviado siempre y cuando sea demostrable que el error es de la empresa, dentro de los primeros 3 (Tres) días después de recibida la mercancía, una vez pasados estos tres días el valor de ambos fletes para devolución de un producto enviado por error será asumido en su totalidad por el cliente.</li>

<li> ¿Qué horarios tienen los envíos?: Siempre realizamos nuestro mejor esfuerzo para despachar los productos el mismo día del pago, sin embargo de acuerdo con el volumen de venta diario las compras realizadas de Lunes a Viernes de 9.30 AM a 5:00 PM y Sábados de 9.30AM a 12:00PM serán despachadas el mismo día, las compras realizadas fuera de ese horario se despacharan el día hábil siguiente, los días Domingos y Festivos no tenemos atención al público.</li>

<li> ¿Cuál es el costo del envío?: Todos los productos comprados por la tienda On-Line incluyen el costo del envío a cualquier parte de Colombia</li>

<li>  Llegó mi mercancía pero la transportadora me está cobrando el envío ¿Qué hago?: Si por equivocación algún artículo comprado por la tienda On-Line se enviara con flete contra-entrega, recomendamos recibir y pagar el envío y comunicarse con nosotros para la devolución en efectivo del costo del flete.</li>

<li>  La mercancía tiene apariencia de haber sido destapada ¿Qué hago?: Los envíos realizados se empacan correctamente en cajas de cartón y se envuelven con vinipel negro, en la parte superior debe encontrar un rotulo con sus datos personales, y en adentro el respectivo articulo con su Factura de venta, si al recibir la mercancía evidencia síntomas de haber sido violada por favor verifíquela delante de la transportadora y confirme que su pedido llega completo y en perfectas condiciones, tenga en cuenta que una vez la transportadora se retire con su firma en la guía dará por entendido que usted recibió todo a satisfacción y no podrá reclamar. Tauret Computadores no se hace responsable por los daños físicos o daños por mal manejo ocasionados por la transportadora.</li>


<p>o olvide contactarnos para resolver cualquier inquietud adicional sobre los envíos:</p>
<i class="fa fa-whatsapp"></i> 3143822820  Skype: Tauret Computadores Correo: ventas@tauretcomputadores.com  PBX: (+57) 1 6065852  Dirección: Centro Comercial Unilago Local 2-274  2-275
            </ol>
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
