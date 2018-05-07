@extends('user.layout.home')

@section('body')

<section class="blanco">

    <div class="container">


        <div class="col-md-8">
            <h5>NUESTRO LEMA:</h5>
            <p>Emotion Fit Center es un centro fitness que además de contar con todos los elementos para que nuestros seguidores sobrepasen sus límites físicos y personales, nos caracterizamos por ofrecerle a nuestros afiliados una gran diversidad de opciones para asistir, el dinero no es una excusa, tenemos desde planes diarios hasta anuales a precio de locura, desde $42,500 por mes. Y no sólo eso, hemos incorporado el  plan mensual con debito automático ofreciendo la tarifa más económica del mercado. La permanencia la decides tú, en Emotion Fit Center siempre serás libre, sin ataduras, y lo mejor de todo, NO HAY MEMBRESÍA.

</p><p>Nuestra política como centro fitness es siempre pensar en nuestros afiliados, más que entrenarlos buscamos guiarlos, sacarlos de la rutina diaria, buscar que interactúen unos con otros y todo de la manera más segura. Para estar más cerca de nuestros afiliados incorporamos a los servicios la plataforma de entrenamiento y seguimiento fitness más reconocida del mundo, TRANINGYM, donde podrás acceder a tu rutina en cualquier momento y en cualquier lugar, desde tu computador hasta tu celular, la cual será diseñada a tu medida de acuerdo a tu salud, peso, características, gustos y objetivos.
</p>
            <h5>COMO CENTRO FITNESS:</h5>
            <p>Buscamos brindar la combinación perfecta para lograr en nuestros seguidores una vida sana, fitness y lo más importante, una vida divertida.  Para lograr nuestro principal objetivo, ofrecemos la mejor guía de entrenamiento, con la colaboración del personal de entrenamiento y médicos de la actividad deportiva,  ofreciendo la mejor guía nutricional de la mano de nuestros nutricionistas y por último, brindando una variedad de posibilidaddes de entrenameinto junto con un ambiente descomplicado y divertido que busca que nuestros seguidores además de mejorar su rendimiento físico, liberen su estrés y endorfinas,  logren fortalecer sus relaciones interpersonales, una vez ingreses a nuestro centro no buscarás nada diferente.</p>
        </div>

        <div class="col-md-4">
            <h5>SIEMPRE CERCA:</h5>
            <p>Emotion Fit Center es más que un centro fitness, es la casa de la mayoría de personas que han vivido cerca nuestro por más de 30 años. Nos caracteriza la cercanía a cada uno de nuestros afiliados y la pasión por mejorar cada día.
</p>
        </div>
    </div>
</section>
@endsection
@section('js')
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
