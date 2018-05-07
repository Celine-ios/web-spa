@extends('user.layout.home')

@section('body')
<section class="blanco">
    <div class="container">
        <h2>Estamos procesando el pago</h2>
        Tu pedido fue procesado con la orden {{str_pad($order->id, 6, "0", STR_PAD_LEFT)}}<br>
        En menos de 1 hora te enviaremos por e-mail el resultado.
    </div>
</section>
@endsection
