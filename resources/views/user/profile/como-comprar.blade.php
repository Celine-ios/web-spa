@extends('user.layout.home')

@section('body')
<section class="blanco">
  <div class="titulo" style="display:none">

  </div>
    <div class="container text-justify">
        <div class="row">
            <p>Para realizar compras manejamos las siguientes formas de pago, tenga en cuenta que la rotación de inventario es diaria y por lo tanto es necesario confirmar el stock de la mercancía antes de realizar cualquier transacción. <strong> Se reciben pedidos para despacho el mismo día hasta las 5:00PM todo correo recibido después de esa hora sera despachado al día siguiente.</strong>:</p>
            <h5>Pago Online</h5>
            <p>Pago Online: Para comprar por nuestra tienda on-line seleccione el producto o productos deseados y escoja la opción “agregar al carrito” una vez haya terminado de agregar los productos en el icono del carrito puede ver la opción “pagar”. Nuestra plataforma de pago es MercadoPago que le permite pagar con tarjetas crédito incluido Codensa, tarjetas débito, Efecty, PSE, Consignación solo debe seguir los pasos y proporcionar la información que el sistema le va pidiendo</p>
            <h5>Información Bancaria:</h5>
            <p>Colpatria Cuenta Corriente 4481017977 Titular Tauret Computadores SAS Nit. 900.545-179-3 Formato de recaudo empresarial.<br>
                Bancolombia Cuenta Corriente 69852266430 Titular Tauret Computadores SAS Nit. 900.545-179-3 Formato de recaudo empresarial.</p>
                <h5>Consignación Bancaria:</h5>
                <p>Una vez realizada la consignación bancaria en efectivo debe enviar un correo a ventas@tauretcomputadores.com con la información del pedido, los datos para su despacho y el comprobante de pago (escáner o foto), debe adicionar al total de su compra el valor de $10.000 (Diez Mil Pesos) que le cobra el banco por el cambio de ciudad.</p>
                <h5>Transferencia Electrónica:</h5>
                <p>Las transferencias electrónicas realizadas desde un computador o un cajero electrónico no tienen costo, las transferencias electrónicas realizadas desde un PAC tienen un incremento de $5.000 (Cinco Mil Pesos) que le cobra el banco por el cambio de ciudad. Tenga en cuenta que las transferencias electrónicas realizadas desde entidades bancarias diferentes pueden tener una demora de hasta 3 días hábiles, Tauret Computadores SAS no realizara el despacho de la mercancía hasta que la transacción se vea reflejada en la cuenta del titular. Una vez realizada la transferencia debe enviar un correo a ventas@tauretcomputadores.com con la información del pedido, los datos para su despacho y el comprobante de pago escáner, foto o pantallazo.</p>
                <h5>Giro:</h5>
                <p>Realícelo a nombre de Mónica Paola Moreno Angarita C.C.: 52.427.608. Tenga en cuenta que si realiza el giro después de las 4:30 PM la mercancía será despachada al día siguiente, una vez realizado debe enviar un correo a ventas@tauretcomputadores.com con la información del pedido, los datos para su despacho y el comprobante escaneado.</p>

                <h5>Información sobre fletes por garantía:</h5>
                <p>Tauret Computadores SAS asumirá totalmente los costos por devolución de un producto defectuoso de acuerdo con los términos y condiciones de garantía únicamente dentro de los primeros 3 (Tres) días después de recibida la mercancía, una vez pasados estos tres días el valor de ambos fletes para devolución de un producto de garantía será asumido en su totalidad por el cliente, para saber el tiempo de garantía de cada producto visite la sección de Garantía.</p>

                <h5>Información del envío:</h5>
                <p>Los envíos de mercancía se realizan a través de las siguientes empresas: SERVIENTREGA – TCC- ENVIA – INTERRAPIDISIMO – DEPRISA. Si requiere que su mercancía viaje por alguna de estas empresas, u otra transportadora en particular de su elección infórmelo en el correo electrónico con la información de su envió de lo contrario Tauret Computadores SAS  realizara el envío por cualquier empresa de estas.</p>
                <p>La mercancía es asegurada por el mínimo valor posible de cada transportadora, esto se debe a que en un sondeo con nuestros clientes el 92% de los clientes prefieren ahorrar en el costo del envío y confían en la empresa transportadora, si usted desea que su mercancía vaya asegurada por el valor real debe informarlo en el correo electrónico junto con su información de lo contrario Tauret Computadores SAS realizara en envío por el mínimo valor asegurable, el cliente asume total responsabilidad por la prima o seguro del envío así como su reclamación ante la transportadora en caso de pérdida referenciado esto en el Código de Comercio en el Capítulo I Artículo 994. (Para compras por la Tienda Online la mercancía siempre será asegurada por el valor real para más información visite los términos y condiciones de la Tienda Online).</p>

                <p>El costo del envío es cancelado por el cliente, si requiere que su flete salga pago debe adicionar el valor a la compra e informar en el correo electrónico, tenga en cuenta que cada transportadora maneja tarifas diferentes y varían según peso o volumen por consiguiente puede que la información suministrada por Tauret Computadores SAS no sea exactamente igual al cobro de la guía, recomendamos visitar la página web de cada empresa o comunicarse con ellos para aproximar el costo del envío, también debe saber que empresas como DEPRISA no llevan la mercancía hasta la dirección cuando es contra-entrega, sino que debe reclamarla en la oficina de ellos. (Para compras por la Tienda Online pueden variar y aplicar diferentes opciones de envío para más información visite los términos y condiciones de la Tienda Online).</p>
                <p>Todos los costos de transporte, seguro y comisiones bancarias serán asumidos por el cliente. En caso de pérdida de mercancía, daños o perjuicios que sufra el producto en el transporte serán únicamente bajo y riesgo de responsabilidad del comprador, así como la reclamación ante la transportadora; Tauret Computadores SAS solo es responsable hasta el momento en que el producto es entregado a la transportadora, pasando a esta, la responsabilidad según el Código de Comercio Título IV del contrato de transporte Capítulo III "Transporte de Cosas" Artículo 1013 "Entrega de Mercancías y Responsabilidad del Transportador" y Artículo 1030 "Responsabilidad por pérdida total o parcial de la cosa".</p>
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
