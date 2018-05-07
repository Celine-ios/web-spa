@extends('user.layout.home')

@section('body')

<div class="container">
    <div class="col-md-8">
        <h4>Tus Configuraciones:</h4>
        <div class="titulo" style="display:none">

  </div>
        <!--estados como los de ts y redes que cambie dependiendo el estado-->
        <div class="table-responsive tabla-deseos">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="width:5%">#</th>
                        <th style="width:50%">Configuración</th>
                        <th style="width:5%">Incluye Armado</th>
                        <th style="width:40%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pc_builds as $key => $build)
                    <tr>
                        <th>{{$key + 1}}</th>
                        <th>{{$build->titulo}}</th>
                        <th>{{($build->armado ? 'SI': 'NO')}}</th>
                        <th>
                            <a href="{{url('view_build/'.$build->id)}}" class="btn btn-tauret btn-xs pull-left"><i class="fa fa-search"></i> Ver</a>
                            {!!Form::open(['route'=>['remove_build', $build->id],'method'=>'POST'])!!}
                            {!!Form::hidden('id', 'all')!!}
                            <button type="submit" class="btn btn-danger btn-xs pull-left" onclick="return confirm('¿Desea remover de la Configuración de tu PC?');"><i class="fa fa-close"></i> Remover</button>
                            {!!Form::close()!!}
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>
    <div class="col-md-4 text-center">
        @include('user.profile.card-profile')
        <div class="banner-patrocinado">
            @include('user.includes.banner-impulso')
        </div>
    </div>
</div>
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