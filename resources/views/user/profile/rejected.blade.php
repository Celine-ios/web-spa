@extends('user.layout.home')

@section('body')
<section class="blanco">
    <div class="container">
        <h2>Tu pedido ha sido rechazado</h2>
        Tu pedido fue procesado con la orden {{str_pad($order->id, 6, "0", STR_PAD_LEFT)}}<br>
        Éste fue rechazado por problemas de pago con el banco.
    </div>
</section>
@endsection
